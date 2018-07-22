@extends('layouts.admin')
@section('title', 'viewTour')
@section("content")


    <div class="col-md-8">
        <h2>Add Tours</h2>
        <div class="content">
            <div class="panel panel-default">
                <div class="panel-heading">Каталог --- Туров</div>
                <form class="form-inline" method="post" action="/admin/tours/import" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="file" class="form-control" name="goodsfile" accept=".xls,.xlsx">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm active">Импорт туров</button>
                </form>
                <a href="/admin/tours/export" class="btn btn-primary btn-sm active" role="button">Экспорт туров</a>
                <div class="table-responsive">
                    <table id="example" class="table table-striped " cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>
                                <a href="{{ route('filter') }}?sort=id&dir={{$dir}}">ID
                                    @if($dir == 'asc')
                                        <span class="glyphicon glyphicon-chevron-down"></span>
                                    @else
                                        <span class="glyphicon glyphicon-chevron-up"></span>
                                    @endif
                                </a>
                            </th>
                            <th>Изображения</th>
                            <th><a href="{{ route('filter') }}?sort=name&dir={{$dir}}">Название
                                    @if($dir == 'asc')
                                        <span class="glyphicon glyphicon-chevron-down"></span>
                                    @else
                                        <span class="glyphicon glyphicon-chevron-up"></span>
                                    @endif
                                </a></th>
                            <th><a href="{{ route('filter') }}?sort=price&dir={{$dir}}">Цена
                                    @if($dir == 'asc')
                                        <span class="glyphicon glyphicon-chevron-down"></span>
                                    @else
                                        <span class="glyphicon glyphicon-chevron-up"></span>
                                    @endif
                                </a></th>
                            <th><a href="{{ route('filter') }}?sort=created_at&dir={{$dir}}">Дата создания
                                    @if($dir == 'asc')
                                        <span class="glyphicon glyphicon-chevron-down"></span>
                                    @else
                                        <span class="glyphicon glyphicon-chevron-up"></span>
                                    @endif
                                </a></th>
                            <th>Категория</th>
                            <th><a href="{{ route('filter') }}?sort=viewed&dir={{$dir}}">Статус
                                    @if($dir == 'asc')
                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                    @else
                                        <span class="glyphicon glyphicon-chevron-up"></span>
                                    @endif
                                </a></th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th class="in-id">ID</th>
                            <th class="im-non">Изображение</th>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Дата создания</th>
                            <th>Категория</th>
                            <th class="im-non">Статус</th>
                            <th class="im-non">Действие</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($tours as $tour)
                            <tr>
                                <td class="id-size">{{$tour["id"]}}</td>
                                @if($tour->images)
                                    @foreach($tour->images as $img)
                                        @if($img->imagePriority == 1)
                                    <td class="img-size">
                                        <img height="50" width="50" src="{{asset('storage/'.$img->img)}}">
                                    </td>
                                        @endif
                                    @endforeach
                                @endif
                                    <td>{{$tour->name}}</td>
                                    <td>{{$tour->price}}, usd.</td>
                                    <td>{{$tour->created_at}}</td>
                                    <td>

                                    </td>
                                    <td>@if($tour->viewed>0)
                                            <input type="checkbox" disabled checked>
                                        @else
                                            <input type="checkbox" disabled>
                                        @endif
                                    </td>
                                    <td><a class="btn btn-danger" href="/admin/tour/delete/{{$tour["id"]}}">Удалить</a>
                                        <a class="btn btn-danger" href="/admin/tour/edit_tours/{{$tour["id"]}}">Изменить</a>
                                    </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <script>
                        $(document).ready(function () {
                            // Setup - add a text input to each footer cell
                            $('#example tfoot th').each(function () {
                                var title = $(this).text();
                                $(this).html('<input type="text" placeholder="" />');
                            });

                            // DataTable
                            var table = $('#example').DataTable();

                            // Apply the search
                            table.columns().every(function () {
                                var that = this;

                                $('input', this.footer()).on('keyup change', function () {
                                    if (that.search() !== this.value) {
                                        that
                                            .search(this.value)
                                            .draw();
                                    }
                                });
                            });
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection