$(document).ready(function() {
  load();
});
/**
 * функция отображения таблицы из бд на странице
 */
function load() {
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
          $("#myTable > thead > tr:last").append('<th>' + key + '</th>');
        }
        $("#myTable").append("");
        break;
      }
      for (let item of data) {
        $("#myTable").append('<tr id = '+ item['id'] + '></tr>');
        for (key in item) {
          $("#myTable > tbody > tr:last").append('<td id = '+ item['id']+ key +'>' + item[key] + '</td>');
        }
      }
    },
    "json"
  );
}

/**
 *Отправка запроса к серверу на добавление записи в таблицу
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
      if (data['status'] == "Success") {
        var user = data['user'];
        $("#myTable").append('<tr id = '+user['id'] + '></tr>');
        for (key in user) {
          $("#myTable > tbody > tr:last").append('<td id = '+ user['id']+ key +'>' + user[key] + '</td>');
        }
        $("#first_name").val(null);
        $("#second_name").val(null);
        $("#age").val(null);
        $("#date_of_birth").val(null);
        $("span").addClass("success");
        $("span").removeClass("error");
      } else {
        $("span").removeClass("success");
        $("span").addClass("error");
      }
      $("span").text(data['status']);
    },
    "json"
  );
});

/**
 *Отправка запроса к серверу на удаление записи в таблицу
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
        $("#myTable").find('#'+$("#id").val()+'').remove();
        $("#id").val(null);
        $("#first_name").val(null);
        $("#second_name").val(null);
        $("#age").val(null);
        $("#date_of_birth").val(null);
        $("span").addClass("success");
        $("span").removeClass("error");
      } else {
        $("span").removeClass("success");
        $("span").addClass("error");
      }
      $("span").text(data);
    },
    "json"
  );
});

/**
 *Отправка запроса к серверу на обновление записи в таблицу
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
        $("#myTable").find('#'+$("#id").val()+'id'+'').replaceWith('<td>'+$("#id").val()+'</td>');
        $("#myTable").find('#'+$("#id").val()+'first_name'+'').replaceWith('<td>'+$("#first_name").val()+'</td>');
        $("#myTable").find('#'+$("#id").val()+'second_name'+'').replaceWith('<td>'+$("#second_name").val()+'</td>');
        $("#myTable").find('#'+$("#id").val()+'age'+'').replaceWith('<td>'+$("#age").val()+'</td>');
        $("#myTable").find('#'+$("#id").val()+'date_of_birth'+'').replaceWith('<td>'+$("#date_of_birth").val()+'</td>');
        $("#id").val(null);
        $("#first_name").val(null);
        $("#second_name").val(null);
        $("#age").val(null);
        $("#date_of_birth").val(null);
        $("span").addClass("success");
        $("span").removeClass("error");
      } else {
        $("span").removeClass("success");
        $("span").addClass("error");
      }
      $("span").text(data);
    },
    "json"
  );
});
