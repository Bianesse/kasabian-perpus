<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardData extends Component
{
    /**
     * Create a new component instance.
     */
    public $kasabianTotalBuku;
    public $kasabianTotalKategori;
    public $kasabianTotalTerpinjam;
    public $kasabianBukuPopuler;
    public $kasabianBukuTidakPopuler;

    public function __construct($kasabianTotalBuku, $kasabianTotalKategori, $kasabianTotalTerpinjam, $kasabianBukuPopuler, $kasabianBukuTidakPopuler)
    {
        $this->kasabianTotalBuku = $kasabianTotalBuku;
        $this->kasabianTotalKategori = $kasabianTotalKategori;
        $this->kasabianTotalTerpinjam = $kasabianTotalTerpinjam;
        $this->kasabianBukuPopuler = $kasabianBukuPopuler;
        $this->kasabianBukuTidakPopuler = $kasabianBukuTidakPopuler;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-data');
    }
}
