<?php

namespace App\Enums;

enum ThreadStatus: string {
    case OPEN = 'OPEN';
    case CLOSED = 'CLOSED';
    case HIDDEN = 'HIDDEN';
    case IMPORTANT = 'IMPORTANT';
}
