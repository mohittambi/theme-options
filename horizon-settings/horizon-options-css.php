<?php
add_action('admin_head', 'my_custom_css');

function my_custom_css() {
echo '<style>
    
.horizon {
    padding: 4px 30px;
    border: 2px solid;
    background: antiquewhite;
}
.horizon .form-table th {
    padding-left: 20px;
}
.horizon h2 {
	background: lightcoral;
	padding: 10px;
    border: 2px solid darkmagenta;
    text-shadow: 4px 3px 6px #f1f1f1;
}
.theme-dash {
    width: 100%;
}
.dash-cont {
    float: right;
    width: 80%;
}
.horizon-main {
    width: 100%;
    display: inline-block;
}
.horizon-menu {
    float: left;
    width: 18%;
    margin-top: 20px;
}
.theme-logo {
    width: auto;
    text-align: center;
}
.theme-logo img {
    height: 50px;
}
.items-list {
    background: bisque;
    padding: 10px;
}
.dash-items li {
    margin-bottom: 0;
    border: 5px solid;
}
.first, .second, .third, .fourth {
    box-shadow: 1px 2px 10px #000000;
}
.dash.title-section {
    padding: 8px;
}
.dash-items .items-list {
    cursor: pointer;
}
</style>';
}