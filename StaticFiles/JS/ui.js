function toggle(x) {
    button = document.querySelectorAll(`div[dataFor = ${x}]`)[0]

    button.setAttribute('dataToggle' , (button.getAttribute('dataToggle') == "off") ? "on" : "off")
    document.getElementById(x).checked = (button.getAttribute('dataToggle') == "off") ? false : true
    // checkbox.prop("checked", )
    // checkbox.c
}





var xhr = new XMLHttpRequest();
    xhr.open('GET', 'dashboard.php?get_session_values=true');
    var ret = {"darkMode": "off", "fontSize": "1"}
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            ret = JSON.parse(xhr.responseText)
            try {
                button = document.querySelectorAll(`div[dataFor = 'darkMode']`)[0]
                button.setAttribute('dataToggle' , ret["darkMode"])
                document.getElementById('darkMode').checked = (ret["darkMode"] == "off") ? false : true
                
            } catch (error) {
                // Do nothing. Sit back. and Ignore the error. Let the universe flow in it's path.
            }
            document.getElementsByTagName('html')[0].style.fontSize = `${ret["fontSize"]}px`
            console.log(ret)
            if (ret["darkMode"] == 'on') {
                document.documentElement.style.setProperty('--colorBG', '#1a1a1aff');
                document.documentElement.style.setProperty('--colorOK', '#8888ffff');
                document.documentElement.style.setProperty('--colorNotOK', '#ff8888ff');
                document.documentElement.style.setProperty('--colorText', '#f5f5f5ff');
            } else {
                document.documentElement.style.setProperty('--colorBG', '#f5f5f5ff');
                document.documentElement.style.setProperty('--colorOK', '#0000ff88');
                document.documentElement.style.setProperty('--colorNotOK', '#ff000088');
                document.documentElement.style.setProperty('--colorTextOK', '#0a0a0aff');
            }
        }
    }
    xhr.send();