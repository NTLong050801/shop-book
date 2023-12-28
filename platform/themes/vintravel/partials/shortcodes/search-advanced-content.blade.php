<div class="inner-form">
    <div class="inner-elements">
        <div class="inner-box inner-location">
            <label for="diemDen">Điểm đến</label>
            <div class="inner-input">
                <i class="fa-solid fa-location-dot"></i>
                <select class="form-control search-select2" name="places[]">
                    <option></option>
                    @foreach($places as $place)
                        <option value="{{ $place->id }}" {{ in_array($place->id,request()->get('places',[])) ?'selected':'' }}>{{ $place->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="inner-box inner-quantity">
            <label for="soLuongKhach">Người lớn</label>
            <div class="inner-input">
                <i class="fa-solid fa-user"></i>
                <input type="number" placeholder="0" id="soLuongNguoiLon" min="1" name="adults" value="{{ request()->get('adults') }}">
            </div>
        </div>
        <div class="inner-box inner-quantity">
            <label for="soLuongKhach">Trẻ em</label>
            <div class="inner-input">
                <i class="fa-solid fa-user"></i>
                <input type="number" placeholder="0" id="soLuongTreEm" min="0" name="children" value="{{ request()->get('children') }}">
            </div>
        </div>
        <div class="inner-box inner-quantity">
            <label for="soLuongKhach">Em bé</label>
            <div class="inner-input">
                <i class="fa-solid fa-user"></i>
                <input type="number" placeholder="0" id="soLuongEmBe" min="0" name="babies" value="{{ request()->get('babies') }}">
            </div>
        </div>
        <div class="inner-box inner-date">
            <label for="ngay">Ngày</label>
            <div class="inner-input">
                <i class="fa-solid fa-calendar-days"></i>
                <input type="text" class="form-control jsDateRange" placeholder="Chọn khoảng ngày" id="ngay" name="date" value="{{ request()->get('date') }}">
            </div>
        </div>
    </div>
    <div class="inner-button">
        <button type="submit">
            <img src="{{ Theme::asset()->url('images/core/icon-arrow-right.png') }}" alt="">
        </button>
    </div>
</div>
