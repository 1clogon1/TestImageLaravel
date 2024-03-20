@extends('form')

@section('title')
    Просмотр
@endsection


@section('main_view')
    <div class="container">
        <div class="text-center">
            <h1>Список изображений</h1>
        </div>
        <br>

        <div class="text-center">
            <h3>Сортировка</h3>
            <ul class="nav justify-content-center">
                <li>
                    <form action="{{route('Sort','name')}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-dark" >
                            Название
                        </button>
                    </form>
                </li>
                <li>
                    <form action="{{route('Sort','date_time')}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-dark" >
                            Дата и время
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <br>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Название</th>
                <th scope="col">Изображение</th>
                <th scope="col">Дата и время</th>
                <th scope="col">Функции</th>
            </tr>
            </thead>
            <tbody>
            @php $i=0; @endphp
            @foreach($image as $image)
                @php $i++; @endphp
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$image->name}}</td>
                    <td><a href='{{asset('/storage/images/'.$image->image)}}'><img src="{{asset('/storage/images/'.$image->image)}}" class="card-img-top" alt="Фото" style="max-height: 250px;max-width: 250px"></a></td>
                    <td>{{$image->created_at}}</td>
                    <td> <div class="p-1">
                            <form action="{{route('Download_Image_zip',$image->image)}}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-dark" >
                                    Скачать
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>

@endsection

@section('script')

@endsection
