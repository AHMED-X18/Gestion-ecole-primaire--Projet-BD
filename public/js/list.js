const appRoutes = {
    students: {
        create: "/student.create",
        list: '/student.index',
        bulletins: '/student.note',
        schedule: '/student.schedule'
    },
    teachers: {
        create: '/formulairecreation',
        list: '/teacher.index',
        schedule: '/student.schedule'
    },
    admin: {
        create: '/inscription',
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
