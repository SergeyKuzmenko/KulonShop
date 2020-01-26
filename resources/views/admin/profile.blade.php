@extends('layouts.admin')

@section('title', 'Администратор')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Профиль</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Заголовок</h3>

            <div class="card-tools">
              <button 
                type="button" 
                class="btn btn-tool" 
                data-card-widget="collapse" 
                data-toggle="tooltip" 
                title="Collapse"
              >
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            Здесь ещё ничего нет
          </div>
          <div class="card-footer">
            Подвал
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection