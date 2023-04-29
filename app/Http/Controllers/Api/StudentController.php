<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentFormRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->has('nome')) {
            $query->where('nome', $request->nome);
        }

        return $query->get();
    }

    public function store(StudentFormRequest $request)
    {
        $student = Student::create($request->all());

        return response()->json($student, 201);
    }

    public function show(int $student)
    {
        $student = Student::find($student);

        if ($student === null) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        return $student;
    }

    public function update(Student $student, StudentFormRequest $request)
    {
        $student->fill($request->all());

        $student->save();

        return $student;
    }

    public function destroy(int $student)
    {
        Student::destroy($student);

        return response()->noContent();
    }
}
