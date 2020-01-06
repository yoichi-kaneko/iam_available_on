<div class="radio-button">
    {{Form::radio($prefix . 'status', 1, (!empty($value) && $value==1), ['class' => 'with-gap radio-col-blue', 'id' => $prefix . 'status_1'])}}
    <label for="{{ $prefix }}status_1">◯</label>
    {{Form::radio($prefix . 'status', 2, (!empty($value) && $value==2), ['class' => 'with-gap radio-col-yellow', 'id' => $prefix . 'status_2'])}}
    <label for="{{ $prefix }}status_2">△</label>
    {{Form::radio($prefix . 'status', 3, (!empty($value) && $value==3), ['class' => 'with-gap radio-col-red', 'id' => $prefix . 'status_3'])}}
    <label for="{{ $prefix }}status_3">×</label>
</div>
