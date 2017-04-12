<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Surveys;
use App\Role;
use Notification;
use App\SurveysSections;
use App\SurveysQuestions;
use App\SurveysAnswers;


class SurveysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->get('query');

        $sortBy = 'name';
        $sortOrder = 'asc';

        $sortFields = ['id', 'name', 'created_at', 'updated_at'];

        if ($request->has('sort_by') && in_array($request->get('sort_by'), $sortFields)) {
            $sortBy = $request->get('sort_by');
        }

        if ($request->has('sort_order') && in_array($request->get('sort_order'), ['asc', 'desc'])) {
            $sortOrder = $request->get('sort_order');
        }

        $surveys = Surveys::orderBy($sortBy, $sortOrder);

        if (!is_null($query)) {
            $surveys = $surveys
                ->where('name', 'like', '%'.$query.'%');
        }

        $surveys = $surveys->paginate(15);

        if (!is_null($query)) {
            $surveys->appends('query', $query);
        }

        return view('admin.surveys.index', [
            'surveys' => $surveys,
            'query' => $query,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.surveys.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $survey = new Surveys([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'role_id' => $request->get('role'),
            'active' => (bool) $request->get('active'),
        ]);

        $survey->save();
        
        

        Notification::success('Chestionar creat cu succes.');

        return redirect()->route('admin.surveys.show', $survey->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey = Surveys::findOrFail($id);

        return view('admin.surveys.show', [
            'survey' => $survey,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $survey = Surveys::findOrFail($id);
        $roles = Role::all();

        return view('admin.surveys.edit', [
            'survey' => $survey,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $survey = Surveys::findOrFail($id);

        $survey->fill([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'role_id' => $request->get('role'),
            'active' => (bool) $request->get('active'),
        ]);

        $survey->save();

        Notification::success('Chestionar actualizat cu succes.');

        return redirect()->route('admin.surveys.edit', $survey->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survey = Surveys::findOrFail($id);
        
        $survey->delete();

        Notification::success('Chestionar sters cu succes.');

        return redirect()->route('admin.surveys.index');
    }
    
    public function activate($id)
    {
        $survey = Surveys::findOrFail($id);

        if ($survey->active == 0) {
            $survey->active = true;
            $survey->save();
            Notification::success('Chestionar activat cu succes.');
        }

        return redirect()->back();
    }

    /**
     * Deactivate given category.
     *
     * @param int $categoryId Category id to deactivate.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deactivate($id)
    {
        $survey = Surveys::findOrFail($id);

        if ($survey->active == 1) {
            $survey->active = false;
            $survey->save();
            Notification::success('Chestionar dezactivat cu succes.');
        }

        return redirect()->back();
    }
    
    public function sections($id)
    {
        $survey = Surveys::findOrFail($id);

        $sections = $survey->sections()->orderBy('order', 'asc')->paginate(15);      
        
        return view('admin.surveys.sections.index', [
            'survey' => $survey,
            'sections' => $sections,
        ]);
    }
    
    public function postSections(Request $request, $id)
    {
        $survey = Surveys::findOrFail($id);

        $sections = new SurveysSections([
            'name' => $request->get('name'),
            'survey_id' => $id,
            'order' => $request->get('order'),
            'active' => (bool) $request->get('active'),
        ]);

        $sections->save();
        

        Notification::success("Sectiune adaugata cu succes");

        return redirect()->route('admin.surveys.sections.index', $survey->id);
    }
    
    public function editSections($id, $sectionId)
    {
        $survey = Surveys::findOrFail($id);
        
        $section = SurveysSections::findOrFail($sectionId); 
        
        return view('admin.surveys.sections.edit', [
            'survey' => $survey,
            'section' => $section,
        ]);
    }
    
    public function updateSections(Request $request, $id, $sectionId)
    {
        $survey = Surveys::findOrFail($id);
        
        $sections = SurveysSections::findOrFail($sectionId);

        $sections->fill([
            'name' => $request->get('name'),
            'survey_id' => $id,
            'order' => $request->get('order'),
            'active' => (bool) $request->get('active'),
        ]);

        $sections->save();
        

        Notification::success("Sectiune modifcata cu succes");

        return redirect()->route('admin.surveys.sections.index', $survey->id);
    }
    
    public function activateSections($id, $sectionId)
    {
        $section = SurveysSections::findOrFail($sectionId);

        if ($section->active == 0) {
            $section->active = true;
            $section->save();
            Notification::success('Sectiune activata cu succes.');
        }

        return redirect()->back();
    }

    public function deactivateSections($id, $sectionId)
    {
        $section = SurveysSections::findOrFail($sectionId);

        if ($section->active == 1) {
            $section->active = false;
            $section->save();
            Notification::success('Sectiune dezactivata cu succes.');
        }

        return redirect()->back();
    }
    
    public function destroySections($id, $sectionId)
    {
        $survey = Surveys::findOrFail($id);
        
        $section = SurveysSections::findOrFail($sectionId);
        
        $section->delete();

        Notification::success('Sectiunea a fost stersa cu succes.');

        return redirect()->route('admin.surveys.sections.index', $survey->id);
    }
    
    public function questions($id)
    {
        $survey = Surveys::findOrFail($id);

        $sections = $survey->sections()->orderBy('order', 'asc')->paginate(15);      
        
        $questions = SurveysQuestions::orderBy('order', 'asc')->paginate(15); 
        
        return view('admin.surveys.questions.index', [
            'survey' => $survey,
            'sections' => $sections,
            'questions' => $questions,
        ]);
    }
    
    public function postQuestions(Request $request, $id)
    {
        $survey = Surveys::findOrFail($id);

        $question = new SurveysQuestions([
            'name' => $request->get('name'),
            'section_id' => $request->get('section'),
            'order' => $request->get('order'),
            'displayMode' => $request->get('displayMode'),
            'active' => (bool) $request->get('active'),
        ]);

        $question->save();
        

        Notification::success("Sectiune adaugata cu succes");

        return redirect()->route('admin.surveys.questions.index', $survey->id);
    }
    
    
    public function editQuestions($id, $questionId)
    {
        $survey = Surveys::findOrFail($id);
        
        $sections = $survey->sections; 
        
        $question = SurveysQuestions::findOrFail($questionId);
        
        return view('admin.surveys.questions.edit', [
            'survey' => $survey,
            'sections' => $sections,
            'question' => $question,
        ]);
    }
    
    public function updateQuestions(Request $request, $id, $questionId)
    {
        $survey = Surveys::findOrFail($id);
        
        $question = SurveysQuestions::findOrFail($questionId);
        
        $question->fill([
            'name' => $request->get('name'),
            'section_id' => $request->get('section'),
            'order' => $request->get('order'),
            'active' => (bool) $request->get('active'),
        ]);

        $question->save();
        

        Notification::success("Inrebare modifcata cu succes");

        return redirect()->route('admin.surveys.questions.index', $survey->id);
    }
    
    public function activateQuestions($id, $questionId)
    {
        $question = SurveysQuestions::findOrFail($questionId);

        if ($section->active == 0) {
            $question->active = true;
            $question->save();
            Notification::success('intrbare activata cu succes.');
        }

        return redirect()->back();
    }

    public function deactivateQuestions($id, $questionId)
    {
        $question = SurveysQuestions::findOrFail($questionId);

        if ($question->active == 1) {
            $question->active = false;
            $question->save();
            Notification::success('Sectiune dezactivata cu succes.');
        }

        return redirect()->back();
    }
    
    public function editAnswers($id, $questionId)
    {
        $survey = Surveys::findOrFail($id);
        
        $sections = $survey->sections; 
        
        $question = SurveysQuestions::findOrFail($questionId);
        
        $answers = SurveysAnswers::where('question_id', $questionId)->get();
        
        return view('admin.surveys.answers.index', [
            'survey' => $survey,
            'sections' => $sections,
            'question' => $question,
            'answers' => $answers
        ]);
    }
    
    public function updateAnswers(Request $request, $id, $questionId)
    {
        $survey = Surveys::findOrFail($id);
        
        $question = SurveysQuestions::findOrFail($questionId);
        
        $answers = SurveysAnswers::where('question_id', $questionId)->first();

        $answers = new SurveysAnswers([
            'name' => $request->get('name'),
            'question_id' => $questionId,
            'order' => $request->get('order'),
        ]);

        $answers->save();
        

        Notification::success("Raspuns adaugat cu succes.");

        return redirect()->route('admin.surveys.questions.answers.edit', [$survey->id, $question->id]);
    }
    
    public function destroyAnswers($id, $questionId, $answerId)
    {
        $survey = Surveys::findOrFail($id);
        
        $answers = SurveysAnswers::findOrFail($answerId);
        
        $answers->delete();

        Notification::success('Raspunsul a fost stersa cu succes.');

        return redirect()->back();
    }
}
