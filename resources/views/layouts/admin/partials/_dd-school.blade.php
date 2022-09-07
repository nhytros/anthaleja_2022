<div class="btn-group mb-2 px-1">
    <button type="button" class="btn btn-primary dropdown-toggle text-start" data-bs-toggle="dropdown"
        aria-expanded="false">
        {!! getIcon('fas', 'school') !!} {{ __('School') }}
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item{{ getActivePage('admin/school/course*') }}"
                href="{{ route('admin.school.courses') }}">
                {!! getIcon('fas', 'book') !!} {{ __('Courses') }}
            </a></li>
        <li><a class="dropdown-item{{ getActivePage('admin/school/teacher*') }}"
                href="{{ route('admin.school.teachers') }}">
                {!! getIcon('fas', 'chalkboard-teacher') !!} {{ __('Teachers') }}
            </a></li>
        <li><a class="dropdown-item{{ getActivePage('admin/school/student*') }}"
                href="{{ route('admin.school.students') }}">
                {!! getIcon('fas', 'book-reader') !!} {{ __('Students') }}
            </a></li>
    </ul>
</div>
