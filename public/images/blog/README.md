# 📸 Imagens do Blog

Este diretório contém as imagens usadas nos posts do blog.

## 📐 Especificações Recomendadas

### Formato
- **Preferencial**: WebP (melhor compressão e qualidade)
- **Alternativo**: PNG (para capturas de tela com texto)
- **Evitar**: JPG (não ideal para screenshots de código)

### Dimensões
- **Largura máxima**: 1200px
- **Altura**: Proporcional ao conteúdo
- **Aspect ratio recomendado**: 16:9 ou livre conforme screenshot

### Otimização
- Comprimir imagens antes do upload
- Usar ferramentas como TinyPNG, Squoosh ou ImageOptim
- Manter tamanho de arquivo < 500KB quando possível

## 📁 Estrutura de Diretórios

Cada post tem sua própria pasta com o mesmo nome do slug:

```
public/images/blog/
├── post-componentes-twig-02-12-2025/
│   ├── twig-components-alerts.webp
│   └── twig-components-code.webp
├── seu-proximo-post/
│   ├── imagem-1.webp
│   └── imagem-2.webp
└── README.md
```

## 🖼️ Convenção de Nomenclatura

**Estrutura de pasta**: `{slug-do-post}/`  
**Nome do arquivo**: `{descrição-curta}.webp`

Exemplos:
- `post-componentes-twig-02-12-2025/twig-components-alerts.webp`
- `post-componentes-twig-02-12-2025/twig-components-code.webp`
- `meu-post-exemplo/resultado-final.webp`

## 📝 Imagens Necessárias para o Post Atual

### Post: Componentes Twig (02/12/2025)

1. **twig-components-alerts.webp**
   - Screenshot mostrando os 4 tipos de alertas renderizados (success, info, warning, error)
   - Capturar a página do navegador com os componentes visíveis
   - Dimensões sugeridas: ~1200x600px

2. **twig-components-code.webp**
   - Screenshot do código Alert.php no editor
   - Mostrar a estrutura do componente
   - Dimensões sugeridas: ~1200x800px

## 🛠️ Como Adicionar Imagens

1. **Criar pasta do post** (se não existir):
   ```bash
   mkdir -p public/images/blog/{slug-do-post}
   ```

2. **Capturar screenshot** do resultado/código desejado

3. **Converter para WebP** (se necessário):
   ```bash
   # Usando ImageMagick
   convert input.png -quality 80 output.webp
   
   # Ou usar ferramentas online: squoosh.app
   ```

4. **Otimizar a imagem** para reduzir tamanho

5. **Salvar na pasta do post**:
   ```bash
   # Exemplo
   public/images/blog/post-componentes-twig-02-12-2025/imagem.webp
   ```

6. **Verificar** se a imagem está sendo carregada corretamente no post

## 🔍 Referência no Template

As imagens são referenciadas no template assim:

```twig
<figure class="my-8">
    <img src="/images/blog/{slug-do-post}/nome-da-imagem.webp" 
         alt="Descrição da imagem"
         class="w-full rounded-lg border border-slate-700 shadow-lg"
         loading="lazy">
    <figcaption class="text-sm text-slate-500 mt-2 text-center italic">
        Legenda da imagem
    </figcaption>
</figure>
```

**Exemplo real**:
```twig
<img src="/images/blog/post-componentes-twig-02-12-2025/twig-components-alerts.webp" 
     alt="Diferentes tipos de alertas renderizados"
     class="w-full rounded-lg border border-slate-700 shadow-lg"
     loading="lazy">
```

## ✅ Checklist Pré-Upload

- [ ] Imagem capturada em boa resolução
- [ ] Formato WebP ou PNG
- [ ] Tamanho otimizado (< 500KB ideal)
- [ ] Nome segue convenção
- [ ] Alt text descritivo no template
- [ ] Testado no navegador

---

**Dica**: Para screenshots de código, use temas escuros que combinem com o design do blog (slate/indigo).
