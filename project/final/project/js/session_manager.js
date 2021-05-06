var GMAO_CHECKACTIVITY, GMAO_TIMECOUNT, remainingTime=1500, timeLimit=300;
GMAO_CHECKACTIVITY = setInterval(check_useractivity, 10000);
//GMAO_CHECKACTIVITY = setInterval(check_useractivity, 5000);

function check_useractivity() {
    $.ajax({
        type: "GET",
        url: getRootURL()+"session_manager.php",
        data: "getremainingtime=1",
        dataType: "JSON",
        success: function (response) {
            var dataJSON = JSON.parse(response);
            console.log(dataJSON);
            //if (dataJSON.loggedOn == 1) {
                var lastRemainingTime = remainingTime;
                remainingTime = dataJSON.tps;
                if (dataJSON.tps > 0 && dataJSON.tps <= timeLimit) {
                    //document.getElementById('gmao_overlay').style.display = 'flex'; // On prévient de la déconnexion dans les 5 prochaines minutes (300 s)
                    if ($('#gmao_overlay').css("display") != 'flex') {
                        $('#tps_restant_deco').html('(Restant: '+secondsToString(remainingTime)+')');
                        $('#gmao_overlay').css("display", "flex").hide().fadeIn();
                        try { $('#gmao_overlay_mobile').modal('show'); } catch(error) {}
                        //document.getElementById("w10_error_sfx").volume = 1;
                        //document.getElementById("w10_error_sfx").play();
                        clearInterval(GMAO_TIMECOUNT);
                        GMAO_TIMECOUNT = setInterval(countdownToLogOut, 1000);
                    }
                }
                if (dataJSON.tps > timeLimit && lastRemainingTime < timeLimit) {
                    //document.getElementById('gmao_overlay').style.display = 'none';
                    clearInterval(GMAO_TIMECOUNT);
                    $('#gmao_overlay').fadeOut();
                    try { $('#gmao_overlay_mobile').modal('hide'); } catch(error) {}
                }
                if (dataJSON.tps <= 0) {
                    // On force la déconnexion
                    $.ajax({ type: "GET", url: getRootURL()+"session_manager.php", data: "logout=1", dataType: "JSON", success: function (response) {if (response.error == "0") window.location.href='?';} });
                }
            //}
        }
    });
}

function gmao_userisback() {
    $.ajax({
        type: "GET",
        url: getRootURL()+"session_manager.php",
        data: "nomoreout=1",
        dataType: "JSON",
        success: function (response) {
            var dataJSON = JSON.parse(response);
            if (dataJSON.error == '') {
                //document.getElementById('gmao_overlay').style.display = 'none';
                clearInterval(GMAO_TIMECOUNT);
                $('#gmao_overlay').fadeOut();
                try { $('#gmao_overlay_mobile').modal('hide'); } catch(error) {}
            }
        }
    });
}

function countdownToLogOut() {
    if (remainingTime <= 0) {
        // On force la déconnexion
        $('#tps_restant_deco').html('(Restant: '+secondsToString(remainingTime)+')');
        $.ajax({ type: "GET", url: getRootURL()+"session_manager.php", data: "logout=1", dataType: "JSON", success: function (response) {if (response.error == "0") window.location.href='?';} });
    } else {
        remainingTime--;
        $('#tps_restant_deco').html('(Restant: '+secondsToString(remainingTime)+')');
    }
}

function secondsToString(time) {
    var minutes = Math.floor(time / 60);
    var seconds = time % 60;
    if (minutes < 10) minutes = "0"+minutes;
    if (seconds < 10) seconds = "0"+seconds;
    return minutes+":"+seconds;
}

function getRootURL() {
    if (window.location.port != '') return window.location.protocol+"//"+window.location.hostname+":"+window.location.port+"/";
    else return window.location.protocol+"//"+window.location.hostname+"/";
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('gmao_nomoreout_btn').addEventListener("click", function() {
        gmao_userisback();
    });
});