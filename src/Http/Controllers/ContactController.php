<?php

namespace EPink\Contact\Http\Controllers;

use Illuminate\Http\Request;
use EPink\Contact\Models\Contact;
use EPink\Contact\Http\Requests\StoreContact;
use EPink\Contact\Http\Resources\ContactsResource;

class ContactController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:api')->except(['store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            return response()->json([
                'contacts' => ContactsResource::collection(Contact::all())
            ], 200);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Unexpected server error'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContact $request)
    {
        $validated = $request->validated();

        try {

            $contact = Contact::create($validated);
    
            return response()->json(null, 204);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Unexpected server error'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        try {
            
            return response()->json([
                'contact' => new ContactResource($contact)
            ], 200);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Unexpected server error'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContact $request, Contact $contact)
    {
        $validated = $request->validated();

        try {

            $contact->update($validated);

            return response()->json([
                'contact' => $contact
            ], 200);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Unexpected server error'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        try {

            $contact->delete();

            return response()->json(null, 204);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Unexpected server error'], 500);
        }
    }
}
