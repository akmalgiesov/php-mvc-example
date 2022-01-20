let page = 1;
let sortingField = 'id';
let sortingType = 'ASC'


function load(){
  $.ajax({
     url: '/tasks',
     method: 'GET',
     data: {
         page: page,
         sortingField: sortingField,
         sortingType: sortingType
     }
 }).done(function(data) {
   renderData(data);
 }).fail(function(data) {

 })
}


function insertTask(fio,mail,taskText){
  $.ajax({
     url: '/task/insert',
     method: 'POST',
     data: {
         fio: fio,
         mail: mail,
         taskText: taskText
     }
 }).done(function(data) {
   alert(data);
   location.reload();
 }).fail(function(data) {
 })
}


function renderData(data){
  $('#taskTable tbody').empty();
  for(index in data){
    $('#taskTable > tbody:last-child').append(`<tr><td>${data[index].id}</td><td>${data[index].fio}</td><td>${data[index].mail}</td><td>${data[index].task}</td><td>${data[index].status}</td><td>${data[index].edited}</td></tr>`);
  }
}


$( ".sort-link" ).click(function() {
  sortingField = $(this).attr("data");
  sortingType == 'ASC' ? sortingType = 'DESC':sortingType = 'ASC';
  load();
});


$( ".page-link" ).click(function() {
  page = $(this).attr("data");
  load();
});

$( "#insert" ).click(function() {

let fio = $("#fio").val();
let mail = $("#mail").val();
let taskText = $("#taskText").val();

validate(fio,mail,taskText);

});

function validate(fio,mail,taskText){
  if(fio == "" || mail == "" || taskText == ""){
    alert('Поля не должны быть пустыми!');
  }else if (mail.split('@').length < 2){
    alert('Введён неправильный адрес почты!');
  }else{
    insertTask(fio,mail,taskText);
  }

}
