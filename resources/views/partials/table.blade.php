@include('partials.modal-show')
<table id="mr-table" class="table table-dark table-hover shadow mb-2 mt-3">
    <thead>
        <tr>
            <th scope="col">#id {{ ucfirst($elementName) }}</th>
            <th scope="col">{{ ucfirst($elementName) }} Title</th>
            @if($elementName !== 'type' && $elementName !== 'technologie')
                <th scope="col" class="d-none d-xl-table-cell">Created at</th>
                <th scope="col" class="d-none d-xl-table-cell">technologies</th>
            @elseif($elementName === 'technologie')
                <th scope="col" class="d-none d-xl-table-cell">Color</th>
            @endif
            <th scope="col" class="d-none d-lg-table-cell">{{ $elementName === 'technologie' ? 'Icon' : 'Type' }}</th>
            <th scope="col" class="{{ Route::currentRouteName() === 'admin.' . $elementName . 's.index' ? '' : 'd-none' }}">
                Administration Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($elements as $element)
            <tr>
                <td>{{ $element->id }}</td>
                <td>{{ $element->title ?? $element->name }}</td>
                @if($elementName !== 'type' && $elementName !== 'technologie')
                    <td class="d-none d-xl-table-cell">
                        @if($elementName === 'project')
                            {{ $element->created_at->format('Y-m-d') }}
                        @endif
                    </td>
                    <td class="d-none d-xl-table-cell">
                    @if($elementName === 'project' && $element->technologies)
                        @foreach($element->technologies as $technology)
                            <i class="{{ $technology->icon }} fs-1" style="color: {{ $technology->color }};"></i>
                        @endforeach
                    @endif
                    </td>
                @elseif($elementName === 'technologie')
                    <td class="d-none d-xl-table-cell">
                        <span style="color: {{ $element->color }};">{{ $element->color }}</span>
                    </td>
                @endif
                <td class="d-none d-lg-table-cell">
                    @if($elementName === 'technologie')
                        <i class="{{ $element->icon }} fs-1" style="color: {{ $element->color }};"></i>
                    @else
                        {{ $element->type->name ?? 'No Type' }}
                    @endif
                </td>
                <td class="{{ Route::currentRouteName() === 'admin.' . $elementName . 's.index' ? '' : 'd-none' }}">
                    <div class="d-flex justify-content-center align-items-center">
                        <!-- Administration Actions -->
                        <a href="#" class="table-icon p-3 m-1 open-modal-info" data-bs-toggle="modal" data-bs-target="#staticBackdropInfo"
                        data-element-name="{{ $elementName }}" data-id="{{ $element->id }}"
                        data-title="{{ $element->title ?? $element->name }}"
                        data-description="{{ $element->description ?? '' }}"
                        data-created="{{ $element->created_at->format('Y-m-d') ?? '' }}"
                        data-categories="{{ $element->type->name ?? 'No Type' }}"
                        data-color="{{ $element->color ?? '' }}" data-icon="{{ $element->icon ?? '' }}"
                        data-type="{{ $element->type->name ?? '' }}">
                            <div class="icon-container">
                                <i class="fas fa-info-circle"></i>
                            </div>
                        </a>
                        
                        <a href="{{ route('admin.' . $elementName . 's.edit', $element) }}" class="table-icon m-1 pe-2">
                            <div class="icon-container">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                        </a>

                        <form id="delete-form-{{ $element->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-table table-icon delete-button" data-item-title="{{ $element->title }}" data-item-id="{{ $element->id }}" data-item-name="{{ $elementName }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@include('partials.modal-delete')

