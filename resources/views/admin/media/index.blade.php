@extends('layouts.admin')
@section('content')
    <h1>Media</h1>
    @if(isset($photos) && $photos)
        <form method="post" action="{{ route('media.delete') }}"  class="form-inline">
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value="">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="delete_all" class="btn btn-primary form-control">
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="" id="options"></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($photos as $photo)
                        <tr>
                            <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" id="" value="{{ $photo->id }}"></td>
                            <td>{{ $photo->id }}</td>
                            <td><a href="{{ route('media.edit', $photo->id) }}"><img height="60" class="img-rounded" src="{{ $photo->file ? $photo->file == '/images/' ? $photo->mediaPlaceholder() : $photo->file : $photo->mediaPlaceholder() }}" alt=""></a></td>
                            <td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : 'No date available' }}</td>
                            <td>{{ $photo->created_at ? $photo->updated_at->diffForHumans() : 'No date available' }}</td>
                            <td>
                                {{-- <form method="POST" action="{{ route('media.destroy', $photo->id) }}">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form> --}}
                                <input type="hidden" name="photo" value="{{ $photo->id }}">
                                <div class="form-group">
                                    <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">
                {{ $photos->render() }}
            </div>
        </div>
    @endif
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#options').click(function(){
                if(this.checked){
                    $('.checkBoxes').each(function(){
                        this.checked = true;
                    });
                }else{
                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    });
                }
                console.log('It works')
            });
        });
    </script>
@stop