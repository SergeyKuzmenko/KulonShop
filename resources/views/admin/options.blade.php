@extends('layouts.admin')

@section('title', 'Параметры')

@section('styles')
<style type="text/css">
  .label-inf {
    font-weight: 700; 
    cursor: pointer;"
  }
  .input-group {
    margin-bottom: 15px;
  }
</style>
@endsection

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Параметры главной страницы</h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Параметры</h3>
          </div>
          <form role="form" class="form_options" onsubmit="getOptions(); return false;">
            <div class="card-body">
              <div class="form-group">
                <label for="title">Заголовок страницы</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок страницы">
              </div>
              <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" rows="5" id="description" placeholder="Описание"></textarea>
              </div>

              <h6 class="label-inf" for="percent">Процент скидки</h6>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">-</span>
                </div>
                <input type="number" name="percent" class="form-control" id="percent" placeholder="0">
                <div class="input-group-append">
                  <span class="input-group-text">%</span>
                </div>
              </div>

              <h6 class="label-inf" for="old_price">Старая цена</h6>
              <div class="input-group">
                <input type="number" name="old_price" class="form-control" id="old_price" placeholder="0">
                <div class="input-group-append">
                  <span class="input-group-text">грн</span>
                </div>
              </div>
              
              <h6 class="label-inf" for="new_price">Новая цена</h6>
              <div class="input-group">
                <input type="number" class="form-control" name="new_price" class="form-control" id="new_price" placeholder="0" >
                <div class="input-group-append">
                  <span class="input-group-text">грн</span>
                </div>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sublit-form">Сохранить</button>
            </div>

          </form>
        </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
jQuery(document).ready(function($) {
  $.ajax({
    url: "/admin/api/getOptions",
    type: "GET",
    dataType: "json"
  })
    .done(function(data) {
      let title = $("#title").val(data[0].title);
      let description = $("#description").val(data[0].description);
      let percent = $("#percent").val(data[0].percent);
      let old_price = $("#old_price").val(data[0].old_price);
      let new_price = $("#new_price").val(data[0].new_price);
    })
    .fail(function() {
      console.log("error");
    });
});

function getOptions() {
  $(".btn-sublit-form").attr("disabled", "disabled");
  let formData = $(".form_options").serialize();
  saveOptions(formData);
}

function saveOptions(data) {
  $.ajax({
    url: "/admin/api/saveOptions",
    type: "POST",
    dataType: "json",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    data: data
  })
    .done(function(r) {
      if (r.response) {
        Swal.fire({
          position: "center",
          icon: "success",
          title: "Сохранено",
          showConfirmButton: false,
          timer: 3000
        });
        $(".btn-sublit-form").removeAttr("disabled");
      } else {
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Произошла ошибка",
          showConfirmButton: false,
          timer: 3000
        });
      }
    })
    .fail(function(e) {
      Swal.fire({
        position: "center",
        icon: "error",
        title: "Произошла ошибка",
        showConfirmButton: false,
        timer: 3000
      });
      $(".btn-sublit-form").removeAttr("disabled");
    });
}
</script>
@endsection