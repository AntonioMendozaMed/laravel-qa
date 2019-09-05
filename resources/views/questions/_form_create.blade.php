@csrf
<div class="form-group">
    <label for="question-title">Question title</label>
    <input type="text" name="title" value="" id="question-title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">

    @if ($errors->has('title'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </div>
    @endif

    <label for="question-body">Explain your Question</label>
    <textarea name="body" id="question-body" value="" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"></textarea>

    @if ($errors->has('body'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('body') }}</strong>
        </div>
    @endif

    <div class="form-group">
        <button type="submit" class="btn btn-outline-primary btn-large">{{ $buttonText }}</button>
    </div>
</div>