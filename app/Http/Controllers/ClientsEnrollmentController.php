<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StoreEnrollmentRequest;
    use App\Http\Requests\UpdateEnrollmentRequest;
    use App\Models\ClientsEnrollment;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Routing\Controller;

    class ClientsEnrollmentController extends Controller
    {
        // Retorna matrícula pelo ID do cliente
        public function getEnrollmentByClientId($id)
        {
            $enrollments = ClientsEnrollment::where('client_id', $id)->get();

            if ($enrollments->isEmpty()) {
                return response()->json(['message' => 'No enrollments found for this client'], Response::HTTP_NOT_FOUND);
            }

            return response()->json($enrollments, Response::HTTP_OK);
        }

        // Retorna matrícula pelo ID do estudante
        public function getEnrollmentByStudentId($id)
        {
            $enrollments = ClientsEnrollment::where('student_id', $id)->get();

            if ($enrollments->isEmpty()) {
                return response()->json(['message' => 'No enrollments found for this student'], Response::HTTP_NOT_FOUND);
            }

            return response()->json($enrollments, Response::HTTP_OK);
        }

        // Retorna todas as matrículas
        public function get()
        {
            $enrollments = ClientsEnrollment::all();

            if ($enrollments->isEmpty()) {
                return response()->json(['message' => 'No enrollments found'], Response::HTTP_NOT_FOUND);
            }

            return response()->json($enrollments, Response::HTTP_OK);
        }

        // Cria uma nova matrícula
        public function create(StoreEnrollmentRequest $request)
        {
            $enrollment = ClientsEnrollment::create($request->validated());

            return response()->json($enrollment, Response::HTTP_CREATED);
        }

        // Atualiza uma matrícula existente
        public function update(UpdateEnrollmentRequest $request, $id)
        {
            $enrollment = ClientsEnrollment::find($id);

            if (!$enrollment) {
                return response()->json(['message' => 'Enrollment not found'], Response::HTTP_NOT_FOUND);
            }

            $enrollment->update($request->validated());

            return response()->json($enrollment, Response::HTTP_OK);
        }

        // Remove uma matrícula
        public function destroy($id)
        {
            $enrollment = ClientsEnrollment::find($id);

            if (!$enrollment) {
                return response()->json(['message' => 'Enrollment not found'], Response::HTTP_NOT_FOUND);
            }

            $enrollment->delete();

            return response()->json(['message' => 'Enrollment deleted successfully'], Response::HTTP_OK);
        }
    }
