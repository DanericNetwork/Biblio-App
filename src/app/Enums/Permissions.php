<?php

namespace App\Enums;

enum Permissions: string
{
    // ACTIONS
    case BORROW = 'borrow';
    case RESERVE = 'reserve';
    case RETURN = 'return';
    case LOGIN_MANAGE = 'login_manage';

    // LIBRARY PASSES
    case VIEW_LIBRARY_PASS = 'view_library_pass';
    case CREATE_LIBRARY_PASS = 'create_library_pass';
    case EDIT_LIBRARY_PASS = 'edit_library_pass';
    case DELETE_LIBRARY_PASS = 'delete_library_pass';

    // ITEMS
    case VIEW_ITEM = 'view_item';
    case CREATE_ITEM = 'create_item';
    case EDIT_ITEM = 'edit_item';
    case DELETE_ITEM = 'delete_item';

    // USERS
    case VIEW_USER = 'view_user';
    case CREATE_USER = 'create_user';
    case EDIT_USER = 'edit_user';
    case DELETE_USER = 'delete_user';

    // GRANTS
    case VIEW_GRANT = 'view_grant';
    case CREATE_GRANT = 'create_grant';
    case EDIT_GRANT = 'edit_grant';
    case DELETE_GRANT = 'delete_grant';

    // RESERVATIONS
    case VIEW_RESERVATION = 'view_reservation';
    case CREATE_RESERVATION = 'create_reservation';
    case EDIT_RESERVATION = 'edit_reservation';
    case DELETE_RESERVATION = 'delete_reservation';

    // PAYMENTS
    case VIEW_PAYMENT = 'view_payment';
    case CREATE_PAYMENT = 'create_payment';
    case EDIT_PAYMENT = 'edit_payment';

    // FINES
    case VIEW_FINE = 'view_fine';
    CASE EDIT_FINE = 'manage_fine';

    public function label(): string
    {
        return match ($this) {

            static::BORROW => 'Borrow',
            static::RESERVE => 'Reserve',
            static::RETURN => 'Return',
            static::LOGIN_MANAGE => 'Login Manage',

            static::VIEW_LIBRARY_PASS => 'View Library Pass',
            static::CREATE_LIBRARY_PASS => 'Create Library Pass',
            static::EDIT_LIBRARY_PASS => 'Edit Library Pass',
            static::DELETE_LIBRARY_PASS => 'Delete Library Pass',

            static::VIEW_ITEM => 'View Item',
            static::CREATE_ITEM => 'Create Item',
            static::EDIT_ITEM => 'Edit Item',
            static::DELETE_ITEM => 'Delete Item',

            static::VIEW_USER => 'View User',
            static::CREATE_USER => 'Create User',
            static::DELETE_USER => 'Delete User',

            static::VIEW_GRANT => 'View Grant',
            static::CREATE_GRANT => 'Create Grant',
            static::EDIT_GRANT => 'Edit Grant',
            static::DELETE_GRANT => 'Delete Grant',

            static::VIEW_RESERVATION => 'View Reservation',
            static::CREATE_RESERVATION => 'Create Reservation',
            static::EDIT_RESERVATION => 'Edit Reservation',
            static::DELETE_RESERVATION => 'Delete Reservation',

            static::VIEW_PAYMENT => 'View Payment',
            static::CREATE_PAYMENT => 'Create Payment',
            static::EDIT_PAYMENT => 'Edit Payment',

            static::VIEW_FINE => 'View Fine',
            static::EDIT_FINE => 'Manage Fine',
        };
    }
}
