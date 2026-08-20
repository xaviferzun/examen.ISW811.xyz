@csrf

<div class="mb-3">
    <label class="form-label">Titulo</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
           value="{{ old('title', $ticket->title ?? '') }}">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Descripcion</label>
    <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $ticket->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Categoria</label>
    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
        <option value="">Seleccione una categoria</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @selected(old('category_id', $ticket->category_id ?? '') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Estado</label>
    <select name="status" class="form-select @error('status') is-invalid @enderror">
        @foreach (['pending' => 'Pendiente', 'in_progress' => 'En progreso', 'resolved' => 'Resuelto'] as $value => $label)
            <option value="{{ $value }}"
                @selected(old('status', $ticket->status ?? 'pending') == $value)>
                {{ $label }}
            </option>
        @endforeach
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>