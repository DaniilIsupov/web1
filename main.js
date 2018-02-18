/**
 * This method use when DOM is fully started.
 *
 * This function send request to server.
 *
 * Method "get" sending request to database:
 *
 * @param url:"api.php" - A string containing the URL to which the request is sent.
 * @param array={action=>"read"} - A plain object or string that is sent to the server with the request.
 * @param callback function(data) - A callback function that is executed if the request succeeds.
 * Plays the table on the web page.
 * @param array data - Answer of the server. Сontains all records about users from the table.
 * @param string DataType - The type of data expected from the server.
 */
$(document).ready(function() {
  $.get(
    "api.php",
    {
      act: "get"
    },
    function(data) {
      $("#myTable thead,tr").remove();
      for (let item of data) {
        $("#myTable").append('<thead class = "header"></thead>');
        $("#myTable>thead").append("<tr></tr>");
        for (key in item) {
          $("#myTable > thead > tr:last").append("<th>" + key + "</th>");
        }
        break;
      }
      for (let item of data) {
        $("#myTable").append("<tr id = " + item["id"] + "></tr>");
        for (key in item) {
          $("#myTable > tbody > tr:last").append(
            "<td id = " + item["id"] + key + ">" + item[key] + "</td>"
          );
        }
      }
    },
    "json"
  );

  $('a[href="#toregister"]').click(function() {
    $("#sign_in").css("display", "none");
    $("#sign_up").css("display", "block");
  });
  $('a[href="#tologin"]').click(function() {
    $("#sign_in").css("display", "block");
    $("#sign_up").css("display", "none");
  });
});

/**
 * Install event click on button "create" to create record in table of users.
 *
 * Method "post" sending request to database.
 *
 * @param url:"api.php" - A string containing the URL to which the request is sent.
 * @param array(
 *      'first_name'=>$first_name,
 *      'second_name'=>$second_name,
 *      'age'=>$age,
 *      'date_of_birth'=>$date_of_birth); - A plain object or string that is sent to the server with the request.
 * @param callback function(data) A callback function that is executed if the request succeeds.
 * @param array data - Answer of the server. The data array containing the status of the request and the created record.
 * @param string DataType - The type of data expected from the server.
 */
$("#create").click(function() {
  $.post(
    "api.php",
    {
      act: "create",
      id: $("input[name=id]").val(),
      first_name: $("input[name=first_name]").val(),
      second_name: $("input[name=second_name]").val(),
      age: $("input[name=age]").val(),
      date_of_birth: $("input[name=date_of_birth]").val()
    },
    function(data) {
      if (data["status"] == "Success") {
        var user = data["user"];
        $("#myTable").append("<tr id = " + user["id"] + "></tr>");
        for (key in user) {
          $("#myTable > tbody > tr:last").append(
            "<td id = " + user["id"] + key + ">" + user[key] + "</td>"
          );
        }
        $("#id").val(null);
        $("#first_name").val(null);
        $("#second_name").val(null);
        $("#age").val(null);
        $("#date_of_birth").val(null);
        $("#status").addClass("text-success");
        $("#status").removeClass("text-danger");
      } else {
        $("#status").removeClass("text-success");
        $("#status").addClass("text-danger");
      }
      $("#status").val(data["status"]);
    },
    "json"
  );
});

/**
 * Install event click on button "delete" to delete record in table of users.
 *
 * Method "post" sending request to database to delete record in table of users
 *
 * @param url:"api.php" - A string containing the URL to which the request is sent.
 * @param array('id'=>$id) - A plain object or string that is sent to the server with the request.
 * @param callback function(data) - A callback function that is executed if the request succeeds. Refreshing table
 * of books and output status of opertation.
 * @param array data - Answer of the server. Contains status of operation.
 * @param string DataType - The type of data expected from the server.
 */
$("#delete").click(function() {
  $.post(
    "api.php",
    {
      act: "delete",
      id: $("input[name=id]").val()
    },
    function(data) {
      if (data == "Success") {
        $("#myTable")
          .find("#" + $("#id").val() + "")
          .remove();
        $("#id").val(null);
        $("#first_name").val(null);
        $("#second_name").val(null);
        $("#age").val(null);
        $("#date_of_birth").val(null);
        $("#status").addClass("text-success");
        $("#status").removeClass("text-danger");
      } else {
        $("#status").removeClass("text-success");
        $("#status").addClass("text-danger");
      }
      $("#status").val(data);
    },
    "json"
  );
});

/**
 * Install event click on button "update" to update record in table of users.
 *
 * Method "post" sending request to database to updates record in table of users
 *
 * @param url:"api.php" A string containing the URL to which the request is sent
 * @param array=(
 *      'id'=>$id,
 *      'first_name'=>$first_name,
 *      'second_name'=>$second_name,
 *      'age'=>$age,
 *      'date_of_birth'=>$date_of_birth); - A plain object or string that is sent to the server with the request.
 * @param callback function(data) - A callback function that is executed if the request succeeds.This function
 * receives the status of the operation, if it is successful, it changes the data in the table on the web page.
 * @param array data - Answer of the server. Contains status of operation.
 * @param string DataType - The type of data expected from the server.
 */
$("#update").click(function() {
  $.post(
    "api.php",
    {
      act: "update",
      id: $("input[name=id]").val(),
      first_name: $("input[name=first_name]").val(),
      second_name: $("input[name=second_name]").val(),
      age: $("input[name=age]").val(),
      date_of_birth: $("input[name=date_of_birth]").val()
    },
    function(data) {
      if (data == "Success") {
        $("#myTable")
          .find("#" + $("#id").val() + "id" + "")
          .replaceWith(
            "<td id = " + $("#id").val() + "id" + ">" + $("#id").val() + "</td>"
          );
        $("#myTable")
          .find("#" + $("#id").val() + "first_name" + "")
          .replaceWith(
            "<td id =" +
              $("#id").val() +
              "first_name" +
              " >" +
              $("#first_name").val() +
              "</td>"
          );
        $("#myTable")
          .find("#" + $("#id").val() + "second_name" + "")
          .replaceWith(
            "<td id = " +
              $("#id").val() +
              "second_name" +
              ">" +
              $("#second_name").val() +
              "</td>"
          );
        $("#myTable")
          .find("#" + $("#id").val() + "age" + "")
          .replaceWith(
            "<td id = " +
              $("#id").val() +
              "age" +
              ">" +
              $("#age").val() +
              "</td>"
          );
        $("#myTable")
          .find("#" + $("#id").val() + "date_of_birth" + "")
          .replaceWith(
            "<td id = " +
              $("#id").val() +
              "date_of_birth" +
              ">" +
              $("#date_of_birth").val() +
              "</td>"
          );
        $("#id").val(null);
        $("#first_name").val(null);
        $("#second_name").val(null);
        $("#age").val(null);
        $("#date_of_birth").val(null);
        $("#status").addClass("text-success");
        $("#status").removeClass("text-danger");
      } else {
        $("#status").removeClass("text-success");
        $("#status").addClass("text-danger");
      }
      $("#status").val(data);
    },
    "json"
  );
});
