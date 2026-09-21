@extends('layouts.app')

@section('title', 'บทความ')

@section('content')
    @if (count($blogs) > 0)
        <h2 class="text-center">
            บทความ</h2>

        <table class="table table-bordered text-center ">
            <thead>
                <tr class="table-dark">
                    <th scope="col">#</th>

                    <th scope="col">status</th>
                    <th scope="col">edit</th>
                    <th scope="col">control</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($blogs as $item)
                    <tr>
                        <td>{{ $item->title }}</td>

                        <td>

                            @if ($item->status)
                                <a href="{{ route('change', $item->id) }}" class="btn btn-success">เผยแพร่</a>
                            @else
                                <a href="{{ route('change', $item->id) }}" class="btn btn-danger">ฉบับร่าง</a>
                            @endif
                        </td>
                        <td><a href="{{ route('edit', $item->id) }}" class="btn btn-warning">แก้ไข</a></td>
                        <td><a onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่?')" href="{{ route('delete', $item->id) }}"
                                class="btn btn-danger">ลบ</a></td>
                @endforeach
            </tbody>
        </table>

        {{ $blogs->links() }}
    @else
        <h2>ไม่พบข้อมูล</h2>
    @endif

    {{-- @foreach ($blogs as $item)
        <h2>{{ $item->title }}</h2>
        <p>{{ Str::limit($item->content, 10) }}</p>
        <hr>
        @if ($item->status)
            <a href="{{ route('change', $item->id) }}" class="btn btn-outline-success">เผยแพร่</a>
        @else
            <a href="{{ route('change', $item->id) }}" class="btn btn-outline-danger">ฉบับร่าง</a>
        @endif
    @endforeach --}}
@endsection
