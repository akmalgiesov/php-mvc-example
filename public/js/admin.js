let page = 1;
let sortingField = 'id';
let sortingType = 'ASC'
let id;

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


function loadTask(){
  $.ajax({
     url: '/admin/task/get',
     method: 'GET',
     data: {
         id: id,
     }
 }).done(function(data) {
   renderUpdatingData(data);
 }).fail(function(data) {

 })
}

function renderUpdatingData(data){
  $('#fio').val(data[0].fio);
  $('#mail').val(data[0].mail);
  $('#taskText').val(data[0].task);

  data[0].status == 'Выполнено' ? $("#statusCheck").prop('checked', true):$("#statusCheck").prop('checked', false);
}


function renderData(data){
  $('#taskTable tbody').empty();
  for(index in data){
    $('#taskTable > tbody:last-child').append(`<tr><td>${data[index].id}</td><td>${data[index].fio}</td><td>${data[index].mail}</td><td>${data[index].task}</td><td>${data[index].status}</td><td>${data[index].edited}</td><td><a class="link-primary" data-bs-toggle="modal" data-bs-target="#updateForm" id="${data[index].id}" onclick="loadUpdatingTask(this)">Редактировать</a>
    </td></tr>`);
  }
}

$( ".page-link" ).click(function() {
  page = $(this).attr("data");
  load();
});


$( ".sort-link" ).click(function() {
  sortingField = $(this).attr("data");
  sortingType == 'ASC' ? sortingType = 'DESC':sortingType = 'ASC';
  load();
});



$( "#update" ).click(function() {

let taskText = ($("#taskText").val()).replace('script','');
let status;

$('#statusCheck').is(':checked') ? status = 'Выполнено':status = 'Не выполнено';

updateTask(taskText,status);
});

function loadUpdatingTask(e){
  id = e.id;
  loadTask();
}

function updateTask(taskText,status){
  $.ajax({
     url: '/admin/task/update',
     method: 'POST',
     data: {
         id: id,
         taskText: taskText,
         status: status
     }
 }).done(function(data) {
   alert(data);
   location.reload();
 }).fail(function(data) {

 })
}
