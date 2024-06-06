@php
    function getRole($role) {
        $roles = [
                'admin' => 'Администратор',
                'employee' => 'Сотрудник',
                'dispatcher' => 'Диспетчер'
        ];
        return $roles[$role] ?? 'Сотрудник';
    }
@endphp
