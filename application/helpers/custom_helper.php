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

		redirect('');
	}
}

if (!function_exists('appLoginCheck')) {
	function appLoginCheck($status)
	{
		$ci = &get_instance();
		$user_id = $ci->session->userdata('zelda_user_data');

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