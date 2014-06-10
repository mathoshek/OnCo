<html>
<head>
    <title></title>
</head>
<body>
<script type="text/javascript">
    var filters=["firstName", "lastName", "job", "birthday", "phoneNumber", "hobby", "description", "email"];
    var usedFilters = ["firstName"];

    function generateForm(){
        var html = "<form method=\"get\" action=\"index.php\">\n";
        for(var i = 0; i < usedFilters.length; i++){
            html += "<div id=\"filter";
            html += i;
            html += "\">";

            html += "<label for=\"input";
            html += i;
            html += "\">";
            html += usedFilters[i];
            html += "</label>";

            html += "<input type=\"text\" id=\"input";
            html += i;
            html += "\" name=\""
            html += usedFilters[i];
            html += "\" />";
            html += "<button type='button' onclick=\"";
            html += "filterRemove(\'filter";
            html += i;
            html += "\')\">Remove</button>";
            //html += "<br />";
            html += "</div>"
        }
        html += "<input type=\"submit\" value=\"Filter\"/>";
        html += "</form>";
        html += "<select id='newFilterSelect'>";
        html += "</select>";
        html += "<button onclick='buttonAdd()'>Add</button>";

        //return html;
        document.getElementById("filterForm").innerHTML = html;
         generateSelect();
    }

    function generateSelect(){
        var html = "";
        for(var i = 0; i < filters.length; i++){
            if(usedFilters.indexOf(filters[i]) == -1){
                html += "<option value=\"";
                html += filters[i];
                html += "\">";
                html += filters[i];
                html += "</option>";
            }
        }
        document.getElementById("newFilterSelect").innerHTML = html;
    }

    function filterRemove(rowid){
        if(usedFilters.length > 1)
        {
            var elem = document.getElementById(rowid);
            var filter = elem.children[1].getAttribute('name');
            usedFilters.splice(usedFilters.indexOf(filter), 1);
            elem.parentNode.removeChild(elem);
            generateSelect();
        }
    }

    function buttonAdd(){
        var ddl = document.getElementById("newFilterSelect");
        console.log(ddl.options[ddl.selectedIndex].value);
        usedFilters.push(ddl.options[ddl.selectedIndex].value);
        generateForm();
    }

    window.onload = function(){
         generateForm();
    }
</script>
<div id="filterForm"></div>
</body>
</html>