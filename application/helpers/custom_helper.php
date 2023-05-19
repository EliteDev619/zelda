<?php 
if (!function_exists('getMainContent')) {
	function getMainContent($viewPath, $data)
	{
		$ci = &get_instance();
		$ci->load->library('session');

        $data['navbar'] = $ci->load->view('pages/section/navbar', $data, true);
        $data['main_content'] = $ci->load->view($viewPath, $data, true);
        return $ci->load->view('pages/section/master', $data);
	}
}


if (!function_exists('_alertPopup')) {
	function _alertPopup($message, $type, $upload = false)
	{
		$ci = &get_instance();
		$ci->load->library('session');

		if (($type == 'info') || ($type == 'warning')) {
			$timer = "showConfirmButton: true, confirmButtonText: 'Ok'";
		} else {
			$timer = "timer: 2000";
		}

		if ($upload) {
			$alert = '
			<script type="text/javascript">
				$(document).ready(function() {
					return Swal.fire({
						type: "' . $type . '", title: "Upload Failed", html: "' . $message . '", showConfirmButton: !1, ' . $timer . ', customClass: "content-header-center", 
					}), !1
				});
			</script>';
		} else {
			$alert = '
			<script type="text/javascript">
				$(document).ready(function() {
					return Swal.fire({
						type: "' . $type . '", title: "' . $message . '", showConfirmButton: !1, ' . $timer . ', customClass: "content-header-center", 
					}), !1
				});
			</script>';
		}

		return $ci->session->set_flashdata('message', $alert);
	}
}


if (!function_exists('appLogout')) {
	function appLogout()
	{
		$ci = &get_instance();
		$ci->load->library('session');
		$ci->session->unset_userdata('zelda_user_data');
		$ci->session->unset_userdata('zelda_user_id');

		redirect('');
	}
}

if (!function_exists('appLoginCheck')) {
	function appLoginCheck($status)
	{
		$ci = &get_instance();
		$user_id = $ci->session->userdata('zelda_user_id');

		if ($status == TRUE) {
			if ($user_id == FALSE) {
				redirect(base_url('auth'));
			}
		} else {
			if ($user_id == TRUE) {
				redirect(base_url());
			}
		}
	}
}

if (!function_exists('appAdminCheck')) {
	function appAdminCheck($status)
	{
		$ci = &get_instance();

		if ($status == TRUE) {
			if (!is_admin()) {
				redirect(base_url(''));
			}
		} else {
			if (is_admin()) {
				redirect(base_url());
			}
		}
	}
}

if (!function_exists('is_admin')) {
	function is_admin()
	{
		$ci = &get_instance();
		$ci->load->library('session');
		if ($ci->session->zelda_user_data->role_id == 1) {
			return true;
		}
		return false;
	}
}

if (!function_exists('update_freebet')) {
	function update_freebet()
	{
		$ci = &get_instance();
		$ci->load->library('session');
		
		/////// get days from last update.
		$last_freebet_update = new DateTime($data['user']->last_freebet_update);
		$today = new DateTime(date('Y-m-d'));
		$interval = $today->diff($last_freebet_update);

		if($interval->days > 0){
			$temp_data = array();
			$temp_data['bet_on'] = $data['user']->last_freebet_update;
			$temp_data['user_id'] = $user_id;
			$is_used = $ci->bets_model->getBet($temp_data);
			
			$temp_data['last_freebet_update'] = date('Y-m-d');
			if($is_used){
				$temp_data['freebet'] = $data['user']->freebet + 1;
			} 

			$ci->users_model->update($temp_data, $user_id);
		}
	}
}