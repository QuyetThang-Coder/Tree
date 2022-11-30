function openTab(evt, Name) {
    var i, x, tablinks;
    x = document.getElementsByClassName("tab_seemore");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" tab-select", "");
    }
    document.getElementById(Name).style.display = "block";
    evt.currentTarget.className += " tab-select";
}