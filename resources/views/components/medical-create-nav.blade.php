<div class="row d-flex flex-column">
  <div class="row d-flex justify-content-between align-items-center m-2">
    <h2>Medical Record</h2>
    <a href="{{ Auth::guard('nurse')->check() ? route('medical.show', $record->user_id) : route('record.index') }}" class="btn btn-sm btn-icon btn-light" type="button">
        <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
    </a>
  </div>
  <ul class="nav nav-pills nav-fill mb-3 2-100">
      <li class="nav-item mb-2">
        <a class="nav-link {{ (Route::currentRouteName() == "nurse.history.create" or Route::currentRouteName() == "employee.history.create") ? 'button-active' : 'button'  }}"  href="{{ Auth::guard('nurse')->check() ? route('nurse.history.create', $record->user_id) : route('employee.history.create', $record->user_id) }}">Personal History</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link {{ (Route::currentRouteName() == "nurse.hospitalization.create" or Route::currentRouteName() == "employee.hospitalization.create") ? 'button-active' : 'button'  }}" href="{{ Auth::guard('nurse')->check() ? route('nurse.hospitalization.create', $record->user_id) : route('employee.hospitalization.create', $record->user_id) }}">Hospitalization</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link {{ (Route::currentRouteName() == "nurse.medication.create" or Route::currentRouteName() == "employee.medication.create") ? 'button-active' : 'button'  }}" href="{{  Auth::guard('nurse')->check() ? route('nurse.medication.create', $record->user_id) : route('employee.medication.create', $record->user_id) }}">Medications</a>
      </li>
      <li class="nav-item mb-2">
          <a class="nav-link {{ (Route::currentRouteName() == "nurse.immunization.create" or Route::currentRouteName() == "employee.immunization.create") ? 'button-active' : 'button'  }}" href="{{  Auth::guard('nurse')->check() ? route('nurse.immunization.create', $record->user_id) : route('employee.immunization.create', $record->user_id) }}">Immunization</a>
      </li>
  </ul>
</div>