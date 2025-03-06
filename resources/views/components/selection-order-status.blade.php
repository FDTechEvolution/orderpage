<div class="form-floating mb-3">
    <select class="form-select" name="status" id="status">
        @if ($all)
        <option value="" selected>-- ทั้งหมด --</option>
        @endif
        @foreach ($orderStatus as $key => $text)
        <option value="{{ $key }}">{{ $text }}</option>
        @endforeach

    </select>
    <label for="status">สถานะออเดอร์</label>
</div>
