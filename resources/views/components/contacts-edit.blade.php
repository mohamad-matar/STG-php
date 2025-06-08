@props(['contacts'])
@foreach ($contacts as $contact)
    <div class="row">

        <div class="col-md-4 mt-2   ">
            <label for="contacts"> نوع التواصل </label>
            <select id="contacts" name="contactType[]" class="form-select" required>
                <option value="landphone" @selected($contact->type == 'landphone')>أرضي</option>
                <option value="mobile" @selected($contact->type == 'mobile')>جوال</option>
                <option value="whatsapp" @selected($contact->type == 'whatsapp')>واتساب</option>
                <option value="telegram" @selected($contact->type == 'telegram')>تلغرام</option>
            </select>
        </div>

        <x-input name=contactValue[] label="القيمة" :dbValue="$contact->value" />
        <div class="col-1 mt-2">
            <br>
            <button type="button" onclick="removeCurrent(this)" class="btn btn-success">-</button>
        </div>
    </div>
@endforeach
