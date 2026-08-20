<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    //Show listado d esolicitudes y los filtros
    public function index(Request $request)
    {
        $tickets = Ticket::with('category')
            ->when($request->filled('category_id'), function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->latest()
            ->get();
        $categories = Category::all();
        return view('tickets.index', compact('tickets', 'categories'));
    }

    //Nueva solicitud
    public function create()
    {
        $categories = Category::all();
        return view('tickets.create', compact('categories'));
    }

    //Guardar solicirud
    public function store(Request $request)
    {
        $validated = $this->validateTicket($request);
        Ticket::create($validated);
        return redirect()->route('tickets.index')->with('success', 'Solicitud creada correctamente.');
    }

    //Editar una solicitud
    public function edit(Ticket $ticket)
    {
        $categories = Category::all();
        return view('tickets.edit', compact('ticket', 'categories'));
    }

    //Actualizar una solicitud
    public function update(Request $request, Ticket $ticket)
    {
        $validated = $this->validateTicket($request);
        $ticket->update($validated);
        return redirect()->route('tickets.index')->with('success', 'Solicitud actualizada correctamente.');
    }

    //Eliminar una solicitud
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Solicitud eliminada correctamente.');
    }

    //Validación de datos de solicitud
    private function validateTicket(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,in_progress,resolved',
            'category_id' => 'required|exists:categories,id',
        ]);
    }
}