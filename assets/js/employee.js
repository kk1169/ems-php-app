$(document).ready(function () {
  fetch_employee();

  $(document).on("submit", "#employeeForm", function (e) {
    e.preventDefault();

    var id = $("#employee_id").val();
    var name = $("#name").val();
    var email = $("#email").val();

    if (name != "" && email != "") {
      if (id == "") {
        var data = {
          name: name,
          email: email,
        };
        create_employee(data);
      } else {
        var data = {
          id: id,
          name: name,
          email: email,
        };
        update_employee(data);
      }
    } else {
      // This is client side validation
      alert("All fields are required");
    }
  });

  $(document).on("click", ".edit_employee", function (e) {
    var id = $(this).attr("data-id");
    get_employee(id);
  });

  $(document).on("click", ".delete_employee", function (e) {
    var id = $(this).attr("data-id");

    if (confirm("Are you sure? You want to delete.")) {
      delete_employee(id);
    }
  });
});

// Create Employee (C)
function create_employee(data) {
  $.ajax({
    url: HOST_URL + "app/employee/manage_employee.php?action=create",
    method: "POST",
    data: data,
    success: function (response) {
      response = JSON.parse(response);
      console.log(response);

      if (response.status) {
        reset_employee_form();
        fetch_employee();
        alert(response.message);
      } else {
        alert(response.error);
      }
    },
  });
}

// Update Employee (C)
function update_employee(data) {
  $.ajax({
    url: HOST_URL + "app/employee/manage_employee.php?action=update",
    method: "POST",
    data: data,
    success: function (response) {
      response = JSON.parse(response);
      console.log(response);
      if (response.status) {
        reset_employee_form();
        fetch_employee();
        alert(response.message);
      } else {
        alert(response.error);
      }
    },
  });
}

// Delete Employee
function delete_employee(id) {
  $.ajax({
    url: HOST_URL + "app/employee/manage_employee.php?action=delete&id=" + id,
    method: "GET",
    success: function (response) {
      response = JSON.parse(response);
      if (response.status) {
        fetch_employee();
        alert(response.message);
      }
    },
  });
}

function get_employee(id) {
  $.ajax({
    url: HOST_URL + "app/employee/manage_employee.php?action=get&id=" + id,
    method: "GET",
    success: function (response) {
      response = JSON.parse(response);
      if (response.status) {
        $("#employee_id").val(response.data.id);
        $("#name").val(response.data.name);
        $("#email").val(response.data.email);
      }
    },
  });
}

// Fetch Employee (R)
function fetch_employee() {
  $.ajax({
    url: HOST_URL + "app/employee/manage_employee.php?action=read",
    method: "GET",
    success: function (response) {
      response = JSON.parse(response);
      if (response.status) {
        employee_table_row(response.data);
      }
    },
  });
}

// Add row in the table
function employee_table_row(data) {
  $("#manage_employee").html("");
  data.forEach((e) => {
    var tr = document.createElement("tr");

    var td_id = document.createElement("td");
    td_id.innerHTML = e.id;

    var td_name = document.createElement("td");
    td_name.innerHTML = e.name;

    var td_email = document.createElement("td");
    td_email.innerHTML = e.email;

    var td_action = document.createElement("td");
    td_action.innerHTML = `<button data-id=${e.id} class="btn btn-sm btn-success edit_employee">Edit</button>
    <button data-id=${e.id} class="btn btn-sm btn-danger delete_employee">Delete</button>`;

    tr.append(td_id);
    tr.append(td_name);
    tr.append(td_email);
    tr.append(td_action);
    $("#manage_employee").append(tr);
  });
}

// Reset Employee Form
function reset_employee_form() {
  $("#employee_id").val("");
  $("#name").val("");
  $("#email").val("");
}
