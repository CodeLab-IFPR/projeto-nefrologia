<?php

    namespace App\Http\Controllers;

    use App\Models\Video;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use Illuminate\Validation\Rule;

    class VideoController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $videos = Video::paginate(4);
            return view('admin.videos.index', compact('videos'));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view('admin.videos.create');
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $slug = Str::slug($request->input('title'), '-');
            $request->merge(['slug' => $slug]);
            $request->validate([
                'link' => 'required',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'slug' => 'required|unique:videos,slug',

            ], [
                'slug.unique' => 'Já existe um vídeo com este título.',
            ]);

            // Extrair o ID do vídeo do link
            preg_match('/(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $request->get('link'), $matches);
            $videoId = $matches[1] ?? null;

            if (!$videoId) {
                return redirect()->back()->with('error', 'Link inválido!');
            }

            // Salvar no banco
            Video::create([
                'link' => "https://www.youtube.com/embed/{$videoId}", // Link formatado para o iframe
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => Str::slug($request->input('title')),
                'id_user' => auth()->id(),
                'thumbnail' => $videoId ? "https://img.youtube.com/vi/{$videoId}/sddefault.jpg" : null,
            ]);

            return redirect()->route('admin.videos.index')->with('success', 'Vídeo cadastrado com sucesso!');
        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            $video = Video::findORfail($id);
            return view('admin.videos.edit', compact('video'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            $slug = Str::slug($request->input('title'), '-');
            $request->merge(['slug' => $slug]); // 
            $request->validate(
                [
                    'title' => 'required|string|max:255',
                    'link' => 'required|url',
                    'description' => 'nullable|string',
                    'slug' => [
                        Rule::unique('videos', 'slug')->ignore($id),
                    ],
                ],
                [
                    'title.required' => 'O título é obrigatório.',
                    'title.unique' => 'Já existe um vídeo com este título.',
                    'slug.unique' => 'Já existe um vídeo com este título.',
                ]
            );

            $video = Video::findOrFail($id);

            // Se o link não mudou, usa o que já existe
            if ($request->link === $video->link) {
                $link = $video->link;
                $thumbnail = $video->thumbnail;
            } else {
                // Extrair o ID do novo vídeo do link
                preg_match('/(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $request->get('link'), $matches);
                $videoId = $matches[1] ?? null;

                if (!$videoId) {
                    return back()->with('error', 'Link inválido!');
                }

                $link = "https://www.youtube.com/embed/{$videoId}";
                $thumbnail = "https://img.youtube.com/vi/{$videoId}/sddefault.jpg";
            }

            $video->update([
                'link' => $link,
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => $slug,
                'id_user' => auth()->id(),
                'thumbnail' => $thumbnail,
            ]);

            return redirect()->route('admin.videos.index')->with('success', 'Vídeo atualizado com sucesso!');
        }


        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $video = Video::find($id);
            $video->delete();
            return redirect()->route('admin.videos.index')->with('success', 'Vídeo deletado com sucesso!');
        }
    }
