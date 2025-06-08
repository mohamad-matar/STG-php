@extends('layouts-dashboard.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2> إدارة صور {{ $provider->name_ar }}</h2>
        <div>
            <button type="button" onclick="showForm('store' , {{ $provider->id }}, '' ,'' ,'')" 
                class="btn btn-secondary">
                إضافة صورة
            </button>
            <a class="btn btn-secondary" href="{{ route('provider.edit') }}">عودة</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-9">

                @if ($provider->providerShows->isEmpty())
                    <div class="text-center mb-5">
                        <img src="{{ asset('assets/images/no-data.jpg') }}" alt="" class="w-50 rounded rounded-5">
                    </div>
                @else
                    <table class="table table-bordered table-striped table-hover table-condensed">
                        <tr class="table-secondary">
                            <th> الوصف بالعربي</th>
                            <th> الوصف بالانكليزي</th>
                            <th> الصورة </th>
                            <th> الوظائف</th>
                        </tr>

                        @foreach ($provider->providerShows as $providerShow)
                            <tr>
                                <td>{{ $providerShow->name_ar }}</td>
                                <td>{{ $providerShow->name_en }}</td>
                                <td class="text-center">
                                    <img id="img-review" src="{{ getImgUrl($providerShow->image_id) }}" alt=""
                                        width="100" height="75" onclick="openLightbox(this)">
                                </td>
                                <td class="text-nowrap text-center">
                                    <button type="button"
                                        onclick="showForm('update' , {{ $provider->id }}, {{ $providerShow->id }} , '{{ $providerShow->name_ar }}' , '{{ $providerShow->name_en }}' )"
                                        class="btn btn-sm btn-outline-info">
                                        <i data-feather="edit"></i>
                                    </button>
                                    <form action="{{ route('provider.provider-shows.destroy', $providerShow) }}" method="post"
                                        class="d-inline-block"
                                        onsubmit="return  confirm('Are you sure to delete {{ $providerShow->name_ar }}')">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-danger"><i data-feather="trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </table>                    
                @endif
                <x-show-image />

            </div>
            <div class="col-3">
                <div id="form-create-container"></div>
            </div>
        </div>
    </div>
@endsection
@push('js')

    <script>
        function showForm(type, provider, providerShow, name_ar, name_en) {
            const method = type == 'update' ? `@method('put')` : '';
            const typeInAr = type == 'store' ? 'إنشاء' : 'تعديل';

            const uploadFileElement = `<x-image-upload name='image_id' label='الصورة الرئيسية' col='12'/>`;

            const form = `
            <form action="/provider/provider-shows/${providerShow}" method="post" enctype="multipart/form-data" class="bg-secondary p-3 text-white">
                @csrf
                ${method}
                <div class="row">
            
                <input type="hidden" name="provider_id" value="${provider}">

                <x-input name="name_ar" label="الاسم بالعربي" col="12" dbValue=${name_ar} />
                <x-input name="name_en" label="الاسم بالانكليزي" col="12" dbValue=${name_en} />
                

                // ${type == 'store'? uploadFileElement : ''}
                <div>
                    <button class="btn btn-dark"> ${typeInAr} الصورة</button>
                    <a href="{{ URL::current() }}" class="btn btn-outline-dark">رجوع</a>
                </div>
            </form>`;
            document.getElementById('form-create-container').innerHTML = form;
        }        
    </script>
@endpush
