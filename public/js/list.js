const appRoutes = {
    students: {
        create: "/student.create",
        list: '/student.index',
        classes: '{{ route("classes.index") }}',
        bulletins: '{{ route("bulletins.index") }}',
        schedule: '{{ route("schedules.index") }}',
        stats: '{{ route("stats.index") }}'
    },
    teachers: {
        create: '{{ route("teachers.create") }}',
        list: '{{ route("teachers.index") }}',
        schedule: '{{ route("schedules.teachers") }}',
        classes: '{{ route("classes.teachers") }}',
        evaluations: '{{ route("evaluations.index") }}',
        reports: '{{ route("reports.teachers") }}'
    },
    admin: {
        create: '{{ route("admin.create") }}',
        list: '{{ route("admin.index") }}',
        accounting: '{{ route("accounting.index") }}',
        communication: '{{ route("communication.index") }}',
        archives: '{{ route("archives.index") }}',
        facilities: '{{ route("facilities.index") }}'
    },
    maintenance: {
        create: '{{ route("maintenance.create") }}',
        list: '{{ route("maintenance.index") }}',
        schedule: '{{ route("schedules.maintenance") }}',
        tasks: '{{ route("tasks.maintenance") }}',
        equipment: '{{ route("equipment.index") }}',
        cleaning: '{{ route("cleaning.index") }}'
    }
};
