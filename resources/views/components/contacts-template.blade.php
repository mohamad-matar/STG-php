<div class="template d-none row">
    <div class="col-md-4 mt-2   ">
        <label for="contacts"> نوع التواصل </label>
        <select id="contacts" name="contactType[]" class="form-select" required>
            <option value="">--اختر نوع التواصل </option>
            <option value="landphone">أرضي</option>
            <option value="mobile">جوال</option>
            <option value="whatsapp">واتساب</option>
            <option value="telegram">تلغرام</option>
        </select>
    </div>
    <x-input name=contactValue[] label="القيمة"/>
    <div class="col-1 mt-2">
        <br>
        <button type="button" onclick="removeCurrent(this)" class="btn btn-success">-</button>
    </div>
</div>
@push('js')
    <script>
        function removeCurrent(inp){
            inp.parentNode.parentNode.remove()
        }
    </script>
@endpush