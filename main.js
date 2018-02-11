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
        $("#myTable").append("<tr></tr>");
        for (key in item) {
          $("#myTable > tbody > tr:last").append('<td>' + item[key] + '</td>');
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
      if (data == "Success") {
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
      load();
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
      load();
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
      load();
    },
    "json"
  );
});
