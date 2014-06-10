<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>OnCo</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<script type="text/javascript">
    var filters = ["firstName", "lastName", "job", "birthday", "phoneNumber", "hobby", "description", "email"];
    var usedFilters = ["firstName"];

    function generateForm() {
        var html = "<form method=\"get\" action=\"index.php\">\n";
        html += "<table>";
        for (var i = 0; i < usedFilters.length; i++) {
            html += "<tr id=\"filter";
            html += i;
            html += "\">";

            html += "<td>"
            html += "<label for=\"input";
            html += i;
            html += "\">";
            html += usedFilters[i];
            html += "</label>";
            html += "</td>";

            html += "<td>";
            html += "<input type=\"text\" id=\"input";
            html += i;
            html += "\" name=\""
            html += usedFilters[i];
            html += "\" />";
            html += "</td>";

            html += "<td>";
            html += "<button type='button' onclick=\"";
            html += "filterRemove(\'filter";
            html += i;
            html += "\')\">Remove</button>";
            html += "</td>";
            html += "</tr>";
        }
        html += "<tr>";
        html += "<td colspan='3'>";
        html += "<input style='width:100%' type=\"submit\" value=\"Filter\"/>";
        html += "</td>";
        html += "</tr>";
        html += "</table>";
        html += "</form>";

        html += "<select id='newFilterSelect' style='width:250px;'>";
        html += "</select>";
        html += "<button onclick='buttonAdd()'>Add</button>";

        //return html;
        document.getElementById("filterForm").innerHTML = html;
        generateSelect();
    }

    function generateSelect() {
        var html = "";
        for (var i = 0; i < filters.length; i++) {
            if (usedFilters.indexOf(filters[i]) == -1) {
                html += "<option value=\"";
                html += filters[i];
                html += "\">";
                html += filters[i];
                html += "</option>";
            }
        }
        document.getElementById("newFilterSelect").innerHTML = html;
    }

    function filterRemove(rowid) {
        if (usedFilters.length > 1) {
            var elem = document.getElementById(rowid);
            var filter = elem.children[1].children[0].getAttribute('name');
            usedFilters.splice(usedFilters.indexOf(filter), 1);
            elem.parentNode.removeChild(elem);
            generateSelect();
        }
    }

    function buttonAdd() {
        var ddl = document.getElementById("newFilterSelect");
        //console.log(ddl.options[ddl.selectedIndex].value);
        usedFilters.push(ddl.options[ddl.selectedIndex].value);
        generateForm();
    }

    window.onload = function () {
        generateForm();
    }
</script>
<header>
    <div id="logo">OnCo</div>
    <div id="user_control">
        <div class="signout_button">
            <a href="doSignOut.php">Sign Out</a>
        </div>
    </div>
    <div style="clear:both"></div>
</header>
<section id="contentLoggedIn" style="margin-left: 0; padding:20px;">
    <div id="filterForm" style="margin:0 auto;width:300px;"></div>
</section>
<footer>
    <p>OnCo - Albert Chmilevski and Adrian Sandru - June 2014</p>
</footer>
</body>
</html>