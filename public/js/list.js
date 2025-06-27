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
        list: '/admin.list',
        comptabilite: '/comptabilite',
        communication: '/communication',
        archives: '/archive',
        local: '/local'
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
