# Competa-smoelenboek

## Structure

app — all your public files.
- img — All your image files. I decided to split content images from layout images.
- css — All your css files.
- js — All your javascript files.

resources — all libraries, configs and any other code that acts as a resource in your project.
- config.php — Main configuration file. Should store site wide settings.
- library — Central location for all custom and third party libraries.
- controller — all your files for handling all the events.
- model — all your files for handling all the data.
- view — all your files for handling all the showing.
    -   templates — Reusable components that make up your layout.

dist — all minified files.

test — for tests.

# **Smoelenboek**

## **BEM**
This is how you use the **BEM** + a **State** mixin in Sass:  
```
@include Block(navigation) {
    (content of the block.)

    @include Modifier(small) {
        (content of the modifier.)
    }

    @include Element(list) {
        (content of the element.)

        &-item {
            (content of the element.)
        }
    }

    @include Element(link) {
        (content of the element.)

        @include Modifier(small) {
            (content of the modifier.)
        }
    }

    @include State(active) {
        (content of the state.)
    }
}
```
Everytime the child elements inherit the name of the parent.
so if the Block is *'navigation'* and the Element is *'list'* it will be compiled in CSS to *'.navigation__list'* and if the block is Block is *'navigation'* and the Modifier is *'big'* it will be compiled to *'.navigation--big'*.  
The element seperator is always *'__'* and the modifier seperator is always *'--'*.  
We have also added a State. A state doesnt inherits the parents his name but make a new class with *'.is-(name)'*, so in the example it will be *'.is-active'*.

So now our sass will compile to this:
```
.navigation {
    (content)
}

.navigation__list {
    (content)
}

.navigation__list-item {
    (content)
}
```
