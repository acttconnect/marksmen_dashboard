<div class="mk-job-form">

    <div class="mk-job-form-grid">

        <div class="mk-job-form-group" style="grid-column: 1 / -1;">
            <label for="job-title">
                Job Title <span class="required">*</span>
            </label>

            <input
                id="job-title"
                type="text"
                name="title"
                class="mk-input @error('title') mk-invalid @enderror"
                value="{{ old('title', $job->title ?? '') }}"
                placeholder="e.g. Laravel Developer"
                required
            >

            @error('title')
                <div class="mk-job-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-job-form-group">
            <label for="department">
                Department <span class="required">*</span>
            </label>

            <input
                id="department"
                type="text"
                name="department"
                class="mk-input @error('department') mk-invalid @enderror"
                value="{{ old('department', $job->department ?? '') }}"
                placeholder="e.g. IT"
                required
            >

            @error('department')
                <div class="mk-job-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-job-form-group">
            <label for="employment_type">
                Employment Type <span class="required">*</span>
            </label>

            <select
                id="employment_type"
                name="employment_type"
                class="mk-select @error('employment_type') mk-invalid @enderror"
                required
            >
                <option value="">Select Employment Type</option>

                @foreach(['Full Time','Part Time','Internship','Contract','Freelance'] as $type)
                    <option
                        value="{{ $type }}"
                        @selected(old('employment_type', $job->employment_type ?? '') === $type)
                    >
                        {{ $type }}
                    </option>
                @endforeach
            </select>

            @error('employment_type')
                <div class="mk-job-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-job-form-group">
            <label for="location">
                Location <span class="required">*</span>
            </label>

            <input
                id="location"
                type="text"
                name="location"
                class="mk-input @error('location') mk-invalid @enderror"
                value="{{ old('location', $job->location ?? '') }}"
                placeholder="e.g. Noida / Remote"
                required
            >

            @error('location')
                <div class="mk-job-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-job-form-group">
            <label for="experience">
                Experience <span class="required">*</span>
            </label>

            <input
                id="experience"
                type="text"
                name="experience"
                class="mk-input @error('experience') mk-invalid @enderror"
                value="{{ old('experience', $job->experience ?? '') }}"
                placeholder="e.g. 1-3 Years"
                required
            >

            @error('experience')
                <div class="mk-job-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-job-form-group">
            <label for="open_positions">
                Open Positions <span class="required">*</span>
            </label>

            <input
                id="open_positions"
                type="number"
                name="open_positions"
                min="1"
                class="mk-input @error('open_positions') mk-invalid @enderror"
                value="{{ old('open_positions', $job->open_positions ?? 1) }}"
                required
            >

            @error('open_positions')
                <div class="mk-job-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-job-form-group">
            <label for="status">
                Status <span class="required">*</span>
            </label>

            <select
                id="status"
                name="status"
                class="mk-select @error('status') mk-invalid @enderror"
                required
            >
                @foreach(['draft' => 'Draft', 'open' => 'Open', 'closed' => 'Closed'] as $value => $label)
                    <option
                        value="{{ $value }}"
                        @selected(old('status', $job->status ?? 'draft') === $value)
                    >
                        {{ $label }}
                    </option>
                @endforeach
            </select>

            @error('status')
                <div class="mk-job-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-job-form-group">
            <label for="application_deadline">Application Deadline</label>

            <input
                id="application_deadline"
                type="date"
                name="application_deadline"
                class="mk-input @error('application_deadline') mk-invalid @enderror"
                value="{{ old('application_deadline', isset($job) && $job->application_deadline ? $job->application_deadline->format('Y-m-d') : '') }}"
            >

            @error('application_deadline')
                <div class="mk-job-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-job-form-group full">
            <label for="qualification">Qualification</label>

            <input
                id="qualification"
                type="text"
                name="qualification"
                class="mk-input @error('qualification') mk-invalid @enderror"
                value="{{ old('qualification', $job->qualification ?? '') }}"
                placeholder="e.g. B.Tech / MCA / Any Graduate"
            >

            @error('qualification')
                <div class="mk-job-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-job-form-group full">
            <label>Skills</label>

            @php
                $skills = old('skills');

                if ($skills === null) {
                    $skills = isset($job) ? ($job->skills ?? []) : [''];
                }

                if (empty($skills)) {
                    $skills = [''];
                }
            @endphp

            <div id="skills-wrapper" class="mk-skills">
                @foreach($skills as $skill)
                    <div class="mk-skill-row">
                        <input
                            type="text"
                            name="skills[]"
                            class="mk-input"
                            value="{{ $skill }}"
                            placeholder="e.g. Laravel"
                        >

                        <button type="button" class="mk-skill-remove remove-skill">
                            Remove
                        </button>
                    </div>
                @endforeach

                <button type="button" class="mk-add-skill" id="add-skill">
                    + Add Skill
                </button>
            </div>

            @error('skills')
                <div class="mk-job-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-job-form-group full">
            <label for="job_description">
                Job Description <span class="required">*</span>
            </label>

            <textarea
                id="job_description"
                name="job_description"
                rows="6"
                class="mk-textarea @error('job_description') mk-invalid @enderror"
                placeholder="Enter complete job description..."
                required
            >{{ old('job_description', $job->job_description ?? '') }}</textarea>

            @error('job_description')
                <div class="mk-job-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-job-form-group full">
            <label for="responsibilities">Responsibilities</label>

            <textarea
                id="responsibilities"
                name="responsibilities"
                rows="6"
                class="mk-textarea @error('responsibilities') mk-invalid @enderror"
                placeholder="Enter job responsibilities..."
            >{{ old('responsibilities', $job->responsibilities ?? '') }}</textarea>

            @error('responsibilities')
                <div class="mk-job-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-job-form-group full">
            <label for="requirements">Requirements</label>

            <textarea
                id="requirements"
                name="requirements"
                rows="6"
                class="mk-textarea @error('requirements') mk-invalid @enderror"
                placeholder="Enter candidate requirements..."
            >{{ old('requirements', $job->requirements ?? '') }}</textarea>

            @error('requirements')
                <div class="mk-job-error">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="mk-job-form-footer">
        <a href="{{ route('admin.jobs.index') }}" class="mk-secondary-btn">
            Cancel
        </a>

        <button type="submit" class="mk-primary-btn">
            @if(isset($job))
                Update Job
            @else
                Create Job
            @endif
        </button>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.getElementById('skills-wrapper');
    const addButton = document.getElementById('add-skill');

    if (!wrapper || !addButton) return;

    addButton.addEventListener('click', function () {
        const row = document.createElement('div');
        row.className = 'mk-skill-row';

        row.innerHTML = `
            <input
                type="text"
                name="skills[]"
                class="mk-input"
                placeholder="e.g. React.js"
            >

            <button type="button" class="mk-skill-remove remove-skill">
                Remove
            </button>
        `;

        wrapper.insertBefore(row, addButton);
    });

    wrapper.addEventListener('click', function (event) {
        const button = event.target.closest('.remove-skill');

        if (!button) return;

        const rows = wrapper.querySelectorAll('.mk-skill-row');

        if (rows.length > 1) {
            button.closest('.mk-skill-row').remove();
        } else {
            button.closest('.mk-skill-row').querySelector('input').value = '';
        }
    });
});
</script>
