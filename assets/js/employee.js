$(document).ready(function () {
    fetch_employee();
})


function fetch_employee() {
    $.ajax({
        url: "http://localhost/ems-php-app/app/employee/manage_employee.php",
        method: "GET",
        success: function (response) {
            response = JSON.parse(response);
            if (response.status) {
                employee_table_row(response.data);
            }
        }
    })
}

function employee_table_row(data) {
    data.forEach(e => {
        var tr = document.createElement("tr");

        var td_id = document.createElement("td");
        td_id.innerHTML = e.id;

        var td_name = document.createElement("td");
        td_name.innerHTML = e.name;

        var td_email = document.createElement("td");
        td_email.innerHTML = e.email;

        var td_action = document.createElement("td");
        td_action.innerHTML = "";

        tr.append(td_id);
        tr.append(td_name);
        tr.append(td_email);
        tr.append(td_action);
        $("#manage_employee").append(tr);
    });

}