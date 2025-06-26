@extends('layouts-dashboard.master')
@section('content')
    <div class="padding">
        <div class="box-header text-primary d-flex justify-component-between">
            <h2> عناصر الصفحة الرئيسية</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-input">
                <thead>
                    <tr>
                        <th>الوصف</th>
                        <th>القيمة</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($settings as $setting)
                        <tr>
                            <td>{{ $setting->key }}</td>
                            <form action="{{ route('admin.settings.update', $setting) }}" method="POST">
                                @csrf
                                @method('put')
                                <td>
                                    <textarea name="value" class="form-control" disabled>{{ $setting->value }}</textarea>

                                </td>
                                <td style="width:160px">
                                    <button class="btn btn-secondary" data-state="modify"
                                        onclick="return openEdit(this)">تعديل</button>
                                    <button type="button" class="btn btn-outline-secondary invisible"
                                        onclick="location.reload()">الغاء</button>
                                        {{-- onclick="return closeEdit(this)">الغاء</button> --}}
                                </td>
                            </form>
                        </tr>
                    @endforeach                    
                </tbody>
            </table>
        </div>
        <br>
    @endsection
    @push('js')
        <script>
            function openEdit(btn) {
                btn.classList.toggle('btn-secondary')
                btn.classList.toggle('btn-primary')
                if (btn.getAttribute("data-state") == "modify") {
                    btn.setAttribute("data-state", "save")
                    btn.innerHTML = "حفظ"
                    /** enable input */
                    element = btn.parentNode.previousElementSibling.firstElementChild.disabled =  false

                    /** إظهار زر الغاء */
                    btn.nextElementSibling.classList.remove('invisible')
                    /** تعطيل بقية الأزرار */
                    remainButtons = document.querySelectorAll("[data-state='modify']")
                    for (let remainButton of remainButtons)
                        remainButton.disabled = true
                    return false;
                } else return true;
            }
            
        </script>
    @endpush
