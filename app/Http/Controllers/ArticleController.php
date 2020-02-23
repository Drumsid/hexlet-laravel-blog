<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        // поиск по статьям
        $articles = $q ? Article::where('name', 'like', "%{$q}%")->paginate() : Article::paginate(5);

        // $articles = Article::where('name', 'like', "%{$q}%")->get(); вариант поиска без пагинации
        // $articles = Article::paginate();

        // Статьи передаются в шаблон
        // compact('articles') => [ 'articles' => $articles ]
        return view('article.index', compact('articles', 'q'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    // Вывод формы
    public function create()
    {
        // Передаём в шаблон вновь созданный объект. Он нужен для вывода формы через Form::model
        $article = new Article();
        return view('article.create', compact('article'));
    }

    // Здесь нам понадобится объект запроса для извлечения данных
    public function store(Request $request)
    {
        // Проверка введённых данных
        // Если будут ошибки, то возникнет исключение
        $this->validate($request, [
            'name' => 'required|unique:articles',
            'body' => 'required|min:10',
            'state' => [
                'required',
                Rule::in(['draft', 'published']),
            ]
        ]);

        $article = new Article();
        // Заполнение статьи данными из формы
        $article->fill($request->all());
        // При ошибках сохранения возникнет исключение
        $article->save();

        // Редирект на указанный маршрут с добавлением флеш-сообщения
        return redirect()
            ->route('articles.index');
    }
}
