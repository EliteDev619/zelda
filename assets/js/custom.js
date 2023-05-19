$( document ).ready(function() {
    console.log(remainTime);
    // getTime();

    setInterval(() => {
        getTime();
    }, 1000);

});

function getTime(){
    var remain = '';
    for (const [key, value] of Object.entries(remainTime)) {
        let h = Math.floor(value/3600) < 10 ? '0'+Math.floor(value/3600) : Math.floor(value/3600);
        let m = Math.floor((value%3600)/60) < 10 ? '0'+Math.floor((value%3600)/60) : Math.floor((value%3600)/60);
        let s = Math.floor((value%3600)%60) < 10 ? '0'+Math.floor((value%3600)%60) : Math.floor((value%3600)%60);

        remain = h + " : " + m + " : " + s;
        $('#'+key).text(remain);
        remainTime[key] = value - 1;
    }
}

