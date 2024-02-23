
    <a href="#"
       class="w-50 d-inline-block mb-1 label badge small text-white bg-primary session-coach"
       data-coach-id=""
       data-bs-toggle="modal"
       data-bs-target="#modal-info-session-">
       3 / 4
    </a>

    @include('common.modal_info', [
        'modalId' => 'modal-info-session-',
        'modalTitle' => 'Session  at 10:00pm',
        'size' => 'modal-lg',
        'path' => 'instructor.course.schedule.session',
        'session' => 1,
    ])
