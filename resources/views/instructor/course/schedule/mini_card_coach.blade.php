@foreach ($coaches as $coach)
    <div class="card h-100">
        <div class="card-header p-2 d-flex flex-row align-items-center justify-content-between bg-corporate-color-light text-corporate-dark-color fw-bold">
            <a href="#" class="mr-2" target="_blank" title="Show coach">
                {{$coach->name}} {{$coach->lastname}}
            </a>
        </div>
        <div class="card-body padding-05-rem">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-user fa-3x"></i>
                </div>
                <div class="col-9">

                    <div class="">
                        <p class="mb-0">
                            <img src="{{ asset('assets/img/flags/' . $coach->flag . '.png') }}"
                                class="img-thumbnail flag-icon-25 me-20" />
                            {{$coach->countryName}}
                        </p>
                        <p class="mb-0">
                            <i class="fa fa-star small rating-color"></i>
                            <i class="fa fa-star small rating-color"></i>
                            <i class="fa fa-star small rating-color"></i>
                            <i class="fa fa-star small rating-color"></i>
                            <i class="fa fa-star small rating-color"></i>
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <p class="small text-muted mb-0">

                            <span class="text-corporate-dark-color fw-bold">Le gusta</span>

                    </p>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="#"
            class="text-corporate-dark-color fw-bold small text-decoration-underline select-session-coach"
            data-coach-id="38">Filter Sessions</a>
        </div>
    </div>
    <div style="width: 10px"></div>
@endforeach
