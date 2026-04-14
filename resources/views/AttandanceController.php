public function index()
{
    $data = \App\Models\Attendance::all();
    $total = \App\Models\Attendance::count();

    return view('attendance', compact('data', 'total'));
}